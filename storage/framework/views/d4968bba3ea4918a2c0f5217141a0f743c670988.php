<!doctype html>
<html>
<head>
    <title>My Login Page</title>
</head>
<body>
<
<?php echo e(Form::open(array('url' => 'login'))); ?>

<h1>Login</h1>
<!-- if there are login errors, show them here -->
<p>
    <?php echo e($errors->first('email')); ?>

    <?php echo e($errors->first('password')); ?>

</p>
<p>
    <?php echo e(Form::label('email', 'Email Address')); ?>

    <?php echo e(Form::text('email', Input::old('email'), array('placeholder' => 'check@CZX.com'))); ?>

</p>
<p>
    <?php echo e(Form::label('password', 'Password')); ?>

    <?php echo e(Form::password('password')); ?>

</p>
<p><?php echo e(Form::submit('Submit!')); ?></p>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/divya/PhpstormProjects/App/resources/views/loginpage.blade.php ENDPATH**/ ?>