<?php

namespace App\Jobs;

use App\Jobs\Job;
Use App\Correo;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarCorreo extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $correo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Correo $correo)
    {
        $this->correo = $correo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

     // Trabajo que envia un e-mail
    public function handle(Mailer $mailer)
    {
      //Enviar mail con los datos obtenidos de correo parametrizada en el constructor
      $mailer->send('mails.mensaje', ['mensaje' => $this->correo->mensaje], function ($m) {
        $m->from($this->correo->remite, 'La aplicacion');
        $m->to($this->correo->destino, $this->correo->destino)->subject($this->correo->asunto);
      });

      // Actualiza la base de datos de correo el campo enviado=1 para eliminarlo de la lista
      $ncorreo = \App\Correo::find($this->correo->id);
      $ncorreo->enviado = '1';
      $ncorreo->save();

    }
}
