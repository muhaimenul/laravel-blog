<!--this page will be shown in the email inbox-->

<h3>E-mail from Contact Form of myBlog</h3>

<p>From: {{ $name }}</p>
<p>Phone Number: {{ $phone }}</p>
<hr>
<div>
    {{ $body }}
</div>
<br><br>
<p>Send via: {{ $email }}</p>