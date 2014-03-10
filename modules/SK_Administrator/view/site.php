<style>

    [contenteditable] {
        padding: 5px;
        font-size: 15px;
        text-shadow: 0px 1px 0px #fff;
        outline: none;
        background: -webkit-gradient(linear, left top, left bottom, from(#bcbcbe), to(#ffffff));
        background: -moz-linear-gradient(top, #bcbcbe, #ffffff);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        border: 1px solid #717171;
        -webkit-box-shadow: 1px 1px 0px #efefef;
        -moz-box-shadow: 1px 1px 0px #efefef;
        box-shadow: 1px 1px 0px #efefef;
    }

    [contenteditable]:focus {
        -webkit-box-shadow: 0px 0px 5px #007eff;
        -moz-box-shadow: 0px 0px 5px #007eff;
        box-shadow: 0px 0px 5px #007eff;
    }

</style>
<?php

$db = new SK_Persist();
$t = $db->GetValueFromEntity("sk_config", "root_domain");
?>
<h1>Site</h1>

<p>
    <button>Créer une page</button>
</p>
<table>
    <thead class="first">
    <td>Paramètres</td>
    <td>Valeur</td>
    </thead>
    <tbody>
    <tr>
        <td>URL du domaine</td>
        <td contenteditable="true" id="<?php echo $t->key; ?>"><?php echo $t->val; ?></td>
    </tr>
    </tbody>
    <?php //echo $html; ?>

</table>
<script>
    (function ($) {
        $.fn.wysiwygEvt = function () {
            return this.each(function () {
                var $this = $(this);
                var htmlold = $this.html();
                $this.bind('blur keyup paste copy cut mouseup', function () {
                    var htmlnew = $this.html();
                    if (htmlold !== htmlnew) {
                        $this.trigger('change')
                    }
                })
            })
        }
    })(jQuery);

    $(function () {
        $('td').on('click', function () {
            var o = $(this)[0];
            if (o.id) {
                $('#' + o.id).off();
                $('#' + o.id).wysiwygEvt();
                $('#' + o.id).on('change', function () {
                        $.post( "/modules/SK_Administrator/api/changesettings.php", { entity: o.id, val: $(o).html() } );
                //Execute code here
            }
            )
        }
    });
    })
    ;
</script>

