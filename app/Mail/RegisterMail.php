<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
	use Queueable, SerializesModels;
	public $data;
	/**
	* Create a new data instance.
	*
	* @return void
	*/
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{

      $file = $this->data['politicaventas'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile1 = public_path().'/mails/files/'.$name;

      $file = $this->data['politicadevolucion'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile2 = public_path().'/mails/files/'.$name;

      $file = $this->data['politicacredito'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile3 = public_path().'/mails/files/'.$name;

      $file = $this->data['ordencompra'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile4 = public_path().'/mails/files/'.$name;

      $file = $this->data['serviciofletes'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile5 = public_path().'/mails/files/'.$name;

      $file = $this->data['solicituddistribuidor'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile6 = public_path().'/mails/files/'.$name;

      $file = $this->data['solicitudcredito'];
      $name = str_random(16).'.'.$file->getClientOriginalExtension();
      $file->move('mails/files/', $name);
			$pathToFile7 = public_path().'/mails/files/'.$name;

		return $this->view('mail.messages.registro')
		->attach($pathToFile1)
		->attach($pathToFile2)
		->attach($pathToFile3)
		->attach($pathToFile4)
		->attach($pathToFile5)
		->attach($pathToFile6)
		->attach($pathToFile7);
	}
}
