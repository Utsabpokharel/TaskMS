@component('mail::message')

<h2>Hello Valued Employee,<h2>
        <p>It gives us great pleasure to welcome you as a new member to our System. </p>
        <i>We are pleased to inform you that your Employee Dashboard Login has been activated.<br>
            Please contact office for your login credentials and visit site<b>" http://task.gcn.com.np "</b>
        </i>
        OR
        @component('mail::button', ['url' => 'http://www.task.gcn.com.np/'])
        Click here...
        @endcomponent

        Thanks,<br>
        {{ config('app.name') }}
        @endcomponent
