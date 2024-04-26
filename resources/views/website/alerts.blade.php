@if (session('success'))
   <script>
     Toast.fire({
            icon: "success",
            title: " {!! session('success') !!} "
        });
   </script>
@endif

@if (session('errors'))
<script>
    Toast.fire({
           icon: "error",
           title: " {!! session('errors') !!} "
       });
  </script>
@endif