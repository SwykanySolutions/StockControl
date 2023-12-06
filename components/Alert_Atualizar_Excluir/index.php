<div id="liveAlertPlaceholder"></div>
<script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button id="btn-close-alert" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
    }
</script>
<?php if(isset($_GET["atualizar"])){ ?>
    <script>
        switch (<?=$_GET["atualizar"]?>) {
            case 1:
                appendAlert("Erro na comunicação com o Banco de dados Erro DB 01", "warning");
                break;
            case 2:
                appendAlert("Atualização realizada com sucesso", "success");
                break;

            default:
                appendAlert("Erro ao atualizar tente novamente AT 01", "danger");
                break;
        }
        document.getElementById("btn-close-alert").addEventListener("click", () => { window.location.href = "<?=$_SERVER['PHP_SELF']?>"; });
    </script>
<?php } ?>
<?php if(isset($_GET["excluir"])){ ?>
    <script>
        switch (<?=$_GET["excluir"]?>) {
            case 1:
                appendAlert("Erro na comunicação com o Banco de dados Erro DB 01", "warning");
                break;
            case 2:
                appendAlert("Exclusão realizada com sucesso", "success");
                break;

            default:
                appendAlert("Erro ao excluir tente novamente EXC 01", "danger");
                break;
        }
        document.getElementById("btn-close-alert").addEventListener("click", () => { window.location.href = "<?=$_SERVER['PHP_SELF']?>"; });
    </script>
<?php } ?>