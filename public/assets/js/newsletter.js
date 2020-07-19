var CadastroNews = {
    form: null,
    email: null,
    start: function() {
        this.form = $("#form-cad-news");
        this.email = $("#email-news");
        this.form.bind("submit", CadastroNews.cadastraEmail);
    },  
    cadastraEmail: function() {
        $.post("newsletter", {
            email: $("#email-news").val(),
            action: "cadastro-news"
        }, function(response) {
            if (response == "E-mail cadastrado com sucesso.") {
                CadastroNews.email.attr("value", "");
            }
            alert(response);
            return false;
        });
        return false;
    }
};

$(function() {
    CadastroNews.start();
});