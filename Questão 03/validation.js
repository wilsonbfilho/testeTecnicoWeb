jQuery('#validate-form').validate({

    rules: {
        nome: {
            required: true,
            minlength: 10,
            maxlength: 100  
        },
        email: {
            required: true,
            email: true
        },
        telefone: {
            required: true,
            digits: true,
            minlength: 8
        }
    },
    messages: {
        nome: {
            required: "Por favor, insira seu nome",
            minlength: "Seu nome deve ter pelo menos 10 caracteres",
            maxlength: "Seu nome deve ter no máximo 100 caracteres"  
        },
        email: "Por favor, insira um endereço de email válido",
        telefone: {
            required: "Por favor, insira seu número de telefone",
            digits: "Por favor, insira apenas números no campo de telefone"
        },
        mensagem: "Por favor, digite sua mensagem"
    }
  

});