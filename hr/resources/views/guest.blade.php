<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  @inertiaHead
</head>
<body class="hold-transition login-page">
@inertia
<!-- /.login-box -->
<script>
    window.$root_login = "{{ route('login.check') }}";
</script>
@vite('resources/js/guest.js')
</body>
</html>
