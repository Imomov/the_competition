<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WinnersOfTheFirstStep extends Notification
{
    use Queueable;

    private $winnersData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($winnersData)
    {
        $this->winnersData = $winnersData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'send-email',
            [
                'name_1' => $this->winnersData[0]['name'],
                'hashid_1' => $this->winnersData[0]['hashid'],
                'picture_1' => $this->winnersData[0]['picture'],
                'age_1' => $this->winnersData[0]['age'],
                'courage_1' => $this->winnersData[0]['courage'],
                'justice_1' => $this->winnersData[0]['justice'],
                'mercy_1' => $this->winnersData[0]['mercy'],
                'generosity_1' => $this->winnersData[0]['generosity'],
                'faith_1' => $this->winnersData[0]['faith'],
                'nobility_1' => $this->winnersData[0]['nobility'],
                'hope_1' => $this->winnersData[0]['hope'],
                'strength_1' => $this->winnersData[0]['strength'],
                'defense_1' => $this->winnersData[0]['defense'],
                'battle_strategy_1' => $this->winnersData[0]['battle_strategy'],

                'name_2' => $this->winnersData[1]['name'],
                'hashid_2' => $this->winnersData[1]['hashid'],
                'picture_2' => $this->winnersData[1]['picture'],
                'age_2' => $this->winnersData[1]['age'],
                'courage_2' => $this->winnersData[1]['courage'],
                'justice_2' => $this->winnersData[1]['justice'],
                'mercy_2' => $this->winnersData[1]['mercy'],
                'generosity_2' => $this->winnersData[1]['generosity'],
                'faith_2' => $this->winnersData[1]['faith'],
                'nobility_2' => $this->winnersData[1]['nobility'],
                'hope_2' => $this->winnersData[1]['hope'],
                'strength_2' => $this->winnersData[1]['strength'],
                'defense_2' => $this->winnersData[1]['defense'],
                'battle_strategy_2' => $this->winnersData[1]['battle_strategy'],

                'name_3' => $this->winnersData[2]['name'],
                'hashid_3' => $this->winnersData[2]['hashid'],
                'picture_3' => $this->winnersData[2]['picture'],
                'age_3' => $this->winnersData[2]['age'],
                'courage_3' => $this->winnersData[2]['courage'],
                'justice_3' => $this->winnersData[2]['justice'],
                'mercy_3' => $this->winnersData[2]['mercy'],
                'generosity_3' => $this->winnersData[2]['generosity'],
                'faith_3' => $this->winnersData[2]['faith'],
                'nobility_3' => $this->winnersData[2]['nobility'],
                'hope_3' => $this->winnersData[2]['hope'],
                'strength_3' => $this->winnersData[2]['strength'],
                'defense_3' => $this->winnersData[2]['defense'],
                'battle_strategy_3' => $this->winnersData[2]['battle_strategy'],
            ]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
