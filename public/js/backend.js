(function($){
    var usuario = {
        init : function(){
            this.content = $('.content');
            this.initPlugins();
            this.bindEvents();
            return this;
        },
        initPlugins : function(){
            if(this.content.find('#form-usuario').length){
                this.content.find('.tag-list').tagit({
                        tagSource:leyes,
                        newTagInputText:'Nueva Ley',
                        acceptNewTags:false,
                        inputName:'leyes'
                    });
            }
        },
        bindEvents : function(){
            this.content.find('#tabla-usuario').on('click', '.btn-eliminar-usuario', function(e){
                var btn = $(this);
                bootbox.confirm("¿Está seguro que desea eliminar el usuario ["+btn.data('usuario')+"]?", function(result) {
                    if(result)
                        window.location = btn.attr('href');
                });
                e.preventDefault();
            });
            this.content.find('#tabla-leyes').on('click', '.btn-eliminar-ley', function(e){
                var btn = $(this);
                bootbox.confirm("¿Está seguro que desea eliminar la ley ["+btn.data('ley')+"]?", function(result) {
                    if(result)
                        window.location = btn.attr('href');
                });
                e.preventDefault();
            });
        }
    };

    $(function(){
        window.usuario = usuario.init();
    });
})(jQuery);