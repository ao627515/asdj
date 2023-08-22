@extends('layout.html_layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h5>
                        Sujet : {{ $mail->subject }}
                        <span class="mailbox-read-time float-right">{{ $mail->formatted_date }}</span>
                    </h5>
                </div>
                <div class="mailbox-read-message">{!! $mail->message !!}</div>>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Fonction pour lancer l'impression
        function printAndRedirect() {
            // Appeler la fonction d'impression
            window.print();

            // Faire la redirection après l'impression (après un court délai pour laisser le temps d'imprimer)
            setTimeout(function() {
                window.history.back(); // Rediriger vers la page précédente
            }, 1000); // Rediriger après 1 seconde (ajustez le délai selon vos besoins)
        }

        // Ajouter un gestionnaire d'événement pour lancer l'impression lorsque la page se charge
        window.onload = printAndRedirect;
    </script>
@endsection
