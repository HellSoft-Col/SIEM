<?php

namespace App\Console\Commands;

use App\Models\Penalty;
use App\Models\Reservation;
use Illuminate\Console\Command;

class ValidateIncomingReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validate:incoming';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Valida que las reservas entrantes no esten pasadas';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $reservations = Reservation::ActiveReservations();
        foreach ($reservations as $res) {
            $this->info('---> ' . $res->state);
        }
        foreach ($reservations as $reservation) {
            if (!$this->matchBoolReservation($reservation)) {
                $this->makePenalty($reservation);
                $reservation->state = 'FINALIZED';
                $reservation->save();
                //$this->info('* Multing ' . $reservation->user->name);
            }
        }

        $this->info('Success !!');
    }

    /**
     * Match that end_time is late than actual time
     * @param $reservation
     * @return bool
     */
    private function matchBoolReservation($reservation)
    {

        $actual_time = date('Y-m-d H:i:s');;
        $acum = true;
        if ($reservation->start_time != NULL) {
            if (!($reservation->start_time >= $actual_time)) {
                $acum = $acum && false;
            }
        }

        return $acum;
    }

    /**
     * Create a new Penalty based on the reservation
     *
     * @param $reservation
     * @return mixed
     */

    private function makePenalty($reservation)
    {

        $actTime = date('Y-m-d H:i:s');
        $new_date = date('Y-m-d', strtotime($actTime . ' + 5 days'));
        return Penalty::create([
            'active' => true,
            'reservation_id' => $reservation->id,
            'date_time' => $actTime,
            'penalty_end' => $new_date,
            'reason' => 'No se reporto entrega del recurso en el tiempo dado.',
        ]);

    }

}
