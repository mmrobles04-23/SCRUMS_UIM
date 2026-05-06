<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscripcionConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    public $inscripcion;

    /**
     * Create a new message instance.
     */
    public function __construct($inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }

    /**
     * Obtener el nombre del evento (seminario o congreso)
     */
    private function getNombreEvento(): string
    {
        if ($this->inscripcion->seminario) {
            return $this->inscripcion->seminario->titulo;
        }
        if ($this->inscripcion->congreso) {
            return $this->inscripcion->congreso->titulo;
        }
        return 'Evento UIMA';
    }

    /**
     * Obtener el tipo de evento para el asunto
     */
    private function getTipoEvento(): string
    {
        if ($this->inscripcion->seminario) {
            return 'Seminario';
        }
        if ($this->inscripcion->congreso) {
            return 'Congreso';
        }
        return 'Evento';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Inscripción — ' . $this->getTipoEvento() . ': ' . $this->getNombreEvento(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscripcion_confirmada',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
