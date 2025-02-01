function confirmDelete(form) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        form.submit();
    } else {
        return false;
    }
}

document.getElementById("btnAlterarDados").addEventListener("click", function() {
    document.getElementById("formAlterarDados").style.display = "block";
  });
  
  document.getElementById("cancelarAlteracao").addEventListener("click", function() {
    document.getElementById("formAlterarDados").style.display = "none";
  });