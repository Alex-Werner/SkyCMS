<?php
/**
 * Author: Alex-WERNER
 * Date: 08/02/14
 * Time: 00:28
 * Use:
 */

class SK_Contact {
    function SK_Contact()
    {
        $this->content = $this->loadContact();
        $this->email = "";
    }
    function loadContact()
    {
        return  <<<HTML
    <form class="submission box style" action="/" method="post" id="contact-form">
	<fieldset>
		<legend>Envoyer un e-mail. Tous les champs précédés d'un * sont obligatoires.</legend>
		<div>
			<label id="jform_contact_name-lbl" for="jform_contact_name" class="hasTooltip required" title="" data-original-title="&lt;strong&gt;Nom&lt;/strong&gt;&lt;br /&gt;Votre nom">Nom<span class="star">&nbsp;*</span></label>			<input type="text" name="jform[contact_name]" id="jform_contact_name" value="" class="required" size="30" required="required" aria-required="true">		</div>
		<div>
			<label id="jform_contact_email-lbl" for="jform_contact_email" class="hasTooltip required" title="" data-original-title="&lt;strong&gt;E-mail&lt;/strong&gt;&lt;br /&gt;Adresse e-mail du contact">E-mail<span class="star">&nbsp;*</span></label>			<input type="text" name="jform[contact_email]" class=" required" id="jform_contact_email" value="" size="30" required="required" aria-required="true">		</div>
		<div>
			<label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasTooltip required" title="" data-original-title="&lt;strong&gt;Sujet&lt;/strong&gt;&lt;br /&gt;Saisir ici le sujet de votre message.">Sujet<span class="star">&nbsp;*</span></label>			<input type="text" name="jform[contact_subject]" id="jform_contact_emailmsg" value="" class="required" size="60" required="required" aria-required="true">		</div>
		<div>
			<label id="jform_contact_message-lbl" for="jform_contact_message" class="hasTooltip required" title="" data-original-title="&lt;strong&gt;Message&lt;/strong&gt;&lt;br /&gt;Saisir ici votre message.">Message<span class="star">&nbsp;*</span></label>			<textarea name="jform[contact_message]" id="jform_contact_message" cols="50" rows="10" class="required" required="required" aria-required="true"></textarea>		</div>

	</fieldset>

	<div class="submit">
		<button class="button validate" type="submit">Envoyer</button>
	</div>
	</form>
HTML;

    }

}