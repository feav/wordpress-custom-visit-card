<div action="" id="manif-details" >
    <div class="double">
        <div style="width: 100%">
            <fieldset  >
                <label for="postThematique"><?php _e( 'Thematique :', 'wp_manifestation_manage' ); ?></label>
                <input name="postThematique" type="tel" id="postThematique" value="" />
            </fieldset>
            <div class="double">
                <div style="width: 49%">
                    <label for="postEmail"><?php _e( 'Email Organisateur :', 'wp_manifestation_manage' ); ?></label>
                    <input name="postEmail" type="email" id="postEmail" value="" />
                </div>
                <div style="width: 49%">   
                    <label for="postPhone"><?php _e( 'Telephone Organisateur :', 'wp_manifestation_manage' ); ?></label>
                    <input name="postPhone" type="tel" id="postPhone" value="" />
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #manif-details div.double {
        display: flex;
        justify-content: space-between;
    }
    #manif-details label {
        display: block;
        font-size: 15px;
        margin: 5px;
    }
    #manif-details input {
        width: 100%;
        height: 45px;
        color: #7d7d7d;
    }
    #manif-details select {
        height: 40px !important;
    }

    .double-many > div.hide-label{
            display: none;
    }
    .double-many > div img {
        width: 100% !important;
    }

    .double-many > div {
        width: 30% !important;
        display: inline-block;
    }
    .double-many {
        display: block;
    }
</style>