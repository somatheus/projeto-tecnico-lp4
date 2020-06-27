<?php if (isset($_SESSION['leitor'])){?>
    <button type="button" data-toggle="modal" data-target="#nova-historia" class="mr-4 mb-2 position-fixed btn btn-info btn-circle btn-lg bottom-right"><i class="fas fa-book-medical"></i></button> 

    <div class="modal fade" id="nova-historia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nova história</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="../php/cadastro-historias.php">
                <input type="hidden" name="tipo-historia" value="1" />
                <input type="hidden" name="autor-historia" value="<?=$_SESSION['leitor']['cd_leitor']?>" />

                <div class="modal-body">    
                    
                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="text" name="titulo-historia" class="form-control" placeholder="Título da história" />
                        </div>
                    </div>

                    <div class="form-row">
                        <select class="form-group col-6  custom-select-sm" name="genero-historia">
                            <option value="Ação" selected>Ação</option>
                            <option value="Comédia">Comédia</option>
                            <option value="Fantasia">Fantasia</option>
                        </select>
                    </div>

                
                    <div class="form-group">
                        <textarea class="form-control" name="conteudo-historia"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" id="salvar-nova-historia">Salvar</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
<?php } ?>