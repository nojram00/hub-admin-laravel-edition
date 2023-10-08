
<script>
    function errorAlert (){
        var role = "{{$user_role}}"
        console.log(role);
        alert(`Your are logged in as: ${role}`);
        window.location = '/';
    }
    errorAlert();
</script>
