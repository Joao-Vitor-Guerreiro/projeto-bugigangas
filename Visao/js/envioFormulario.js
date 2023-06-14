let inputs = document.querySelectorAll('.inputs');

function cadastrar() { // checa se algum input esta vazio 
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value === "") {
      event.preventDefault(); // se estiver, o botão não envia o formulario
      window.alert("Preencha todos os dados!!!"); // em vez disso ele ativa esse alerta
      return;
    }
  }
}

