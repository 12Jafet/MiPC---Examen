$(document).ready(function(){
   $('.open-modal').click(function(){
        const id = $(this).data('id');
        $('#idModal').val(id);
   });
});