<div class="alert alert-danger text-center">
    No olvide incluir su orden de compra en el identificador de webpay.cl
    <br>
    Orden: <b>{{ Auth::user()->getPayPending()->order }}</b>
</div>
<table class="ui table">
    <thead>
    <tr>
        <th>Orden</th>
        <th>Plan</th>
        <th>Valor</th>
        <th>Duración</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ Auth::user()->getPayPending()->order }}</td>
        <td>{{ Auth::user()->getPayPending()->plan->name }}</td>
        <td>{{ Auth::user()->getPayPending()->plan->price }}</td>
        <td>{{ Auth::user()->getPayPending()->plan->quantity }} días</td>
    </tr>
    </tbody>
    <tfoot class="full-width">
    <tr>
        <th colspan="4" class="text-right">
            <p class="text-center">
                <a href="https://www.webpay.cl/portalpagodirecto/pages/institucion.jsf?idEstablecimiento=24808484"
                   target="_blank"
                   class="btn btn-primary">Pagar</a>
                <a href="#" onclick="event.preventDefault();
                    document.getElementById('cancel-order').submit();"
                   class="btn btn-secondary">Cancelar</a>
            <form id="cancel-order" action="{{ route('dashboard.order') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            </p>
        </th>
    </tr>
    </tfoot>
</table>
<div class="alert alert-success text-center">
    una vez que pague su membresía en webpay.cl deberá esperar a que se acredite su pago, se le enviará
    un correo de notificación a <b>{{ Auth::user()->email }}</b> cuando su cuenta sea actualizada.
    <br>
    Si desea acelerar su publicación, notifíquenos de su pago al correo info@jobforus.cl
</div>