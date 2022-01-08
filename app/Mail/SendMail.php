<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
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

    

    public function build(Request $request)
    {
       if (!$request['fichier']) {
           return $this->subject($request['objet'])->markdown('emails.message')->with('data', $this->data);
       }else{
        return $this->subject($request['objet'])->markdown('emails.message')->with('data', $this->data)->attach($request['fichier']->getRealPath(), array( 
            'as' =>'fichier'.$request['fichier']->getClientOriginalExtension(),
            'mime' =>$request['fichier']->getMimeType() ) );
        }
    }
}

?>

