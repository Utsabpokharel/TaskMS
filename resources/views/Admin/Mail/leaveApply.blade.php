@component('mail::message')
<h2>Hello Admin,<h2>
        <p>I have applied an application for leave from our system. I would be grateful if gets approved.</p>
        <i><br>
            Please kindly review and check my application for further actions.
        </i>

        @component('mail::button', ['url' => 'http://www.task.gcn.com.np/'])
        Click here...
        @endcomponent

        Thanks,<br>
        {{Auth::user()->name}}
        @endcomponent
