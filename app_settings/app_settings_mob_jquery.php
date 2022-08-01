
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["session_expire" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["remember_me" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cookie_expiration_time" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["retrieve_password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["new_users" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["brute_force" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["brute_force_time_block" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["brute_force_attempts" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enable_2fa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enable_2fa_expiration_time" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["session_expire" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["session_expire" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["remember_me" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["remember_me" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cookie_expiration_time" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cookie_expiration_time" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["retrieve_password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["retrieve_password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["new_users" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["new_users" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["brute_force" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["brute_force" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["brute_force_time_block" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["brute_force_time_block" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["brute_force_attempts" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["brute_force_attempts" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enable_2fa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enable_2fa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enable_2fa_expiration_time" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enable_2fa_expiration_time" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("session_expire" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_session_expire' + iSeqRow).bind('blur', function() { sc_app_settings_session_expire_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_app_settings_session_expire_onfocus(this, iSeqRow) });
  $('#id_sc_field_remember_me' + iSeqRow).bind('blur', function() { sc_app_settings_remember_me_onblur(this, iSeqRow) })
                                         .bind('click', function() { sc_app_settings_remember_me_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_app_settings_remember_me_onfocus(this, iSeqRow) });
  $('#id_sc_field_cookie_expiration_time' + iSeqRow).bind('blur', function() { sc_app_settings_cookie_expiration_time_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_app_settings_cookie_expiration_time_onfocus(this, iSeqRow) });
  $('#id_sc_field_retrieve_password' + iSeqRow).bind('blur', function() { sc_app_settings_retrieve_password_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_app_settings_retrieve_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_new_users' + iSeqRow).bind('blur', function() { sc_app_settings_new_users_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_app_settings_new_users_onfocus(this, iSeqRow) });
  $('#id_sc_field_brute_force_time_block' + iSeqRow).bind('blur', function() { sc_app_settings_brute_force_time_block_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_app_settings_brute_force_time_block_onfocus(this, iSeqRow) });
  $('#id_sc_field_brute_force_attempts' + iSeqRow).bind('blur', function() { sc_app_settings_brute_force_attempts_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_app_settings_brute_force_attempts_onfocus(this, iSeqRow) });
  $('#id_sc_field_enable_2fa' + iSeqRow).bind('blur', function() { sc_app_settings_enable_2fa_onblur(this, iSeqRow) })
                                        .bind('click', function() { sc_app_settings_enable_2fa_onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_app_settings_enable_2fa_onfocus(this, iSeqRow) });
  $('#id_sc_field_enable_2fa_expiration_time' + iSeqRow).bind('blur', function() { sc_app_settings_enable_2fa_expiration_time_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_app_settings_enable_2fa_expiration_time_onfocus(this, iSeqRow) });
  $('#id_sc_field_brute_force' + iSeqRow).bind('blur', function() { sc_app_settings_brute_force_onblur(this, iSeqRow) })
                                         .bind('click', function() { sc_app_settings_brute_force_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_app_settings_brute_force_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-remember_me' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-retrieve_password' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-new_users' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-brute_force' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-enable_2fa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_app_settings_session_expire_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_session_expire();
  scCssBlur(oThis);
}

function sc_app_settings_session_expire_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_remember_me_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_remember_me();
  scCssBlur(oThis);
}

function sc_app_settings_remember_me_onclick(oThis, iSeqRow) {
  do_ajax_app_settings_mob_event_remember_me_onclick();
}

function sc_app_settings_remember_me_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_cookie_expiration_time_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_cookie_expiration_time();
  scCssBlur(oThis);
}

function sc_app_settings_cookie_expiration_time_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_retrieve_password_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_retrieve_password();
  scCssBlur(oThis);
}

function sc_app_settings_retrieve_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_new_users_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_new_users();
  scCssBlur(oThis);
}

function sc_app_settings_new_users_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_brute_force_time_block_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_brute_force_time_block();
  scCssBlur(oThis);
}

function sc_app_settings_brute_force_time_block_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_brute_force_attempts_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_brute_force_attempts();
  scCssBlur(oThis);
}

function sc_app_settings_brute_force_attempts_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_enable_2fa_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_enable_2fa();
  scCssBlur(oThis);
}

function sc_app_settings_enable_2fa_onclick(oThis, iSeqRow) {
  do_ajax_app_settings_mob_event_enable_2fa_onclick();
}

function sc_app_settings_enable_2fa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_enable_2fa_expiration_time_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_enable_2fa_expiration_time();
  scCssBlur(oThis);
}

function sc_app_settings_enable_2fa_expiration_time_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_app_settings_brute_force_onblur(oThis, iSeqRow) {
  do_ajax_app_settings_mob_validate_brute_force();
  scCssBlur(oThis);
}

function sc_app_settings_brute_force_onclick(oThis, iSeqRow) {
  do_ajax_app_settings_mob_event_brute_force_onclick();
}

function sc_app_settings_brute_force_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("session_expire", "", status);
	displayChange_field("remember_me", "", status);
	displayChange_field("cookie_expiration_time", "", status);
	displayChange_field("retrieve_password", "", status);
	displayChange_field("new_users", "", status);
	displayChange_field("brute_force", "", status);
	displayChange_field("brute_force_time_block", "", status);
	displayChange_field("brute_force_attempts", "", status);
	displayChange_field("enable_2fa", "", status);
	displayChange_field("enable_2fa_expiration_time", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_session_expire(row, status);
	displayChange_field_remember_me(row, status);
	displayChange_field_cookie_expiration_time(row, status);
	displayChange_field_retrieve_password(row, status);
	displayChange_field_new_users(row, status);
	displayChange_field_brute_force(row, status);
	displayChange_field_brute_force_time_block(row, status);
	displayChange_field_brute_force_attempts(row, status);
	displayChange_field_enable_2fa(row, status);
	displayChange_field_enable_2fa_expiration_time(row, status);
}

function displayChange_field(field, row, status) {
	if ("session_expire" == field) {
		displayChange_field_session_expire(row, status);
	}
	if ("remember_me" == field) {
		displayChange_field_remember_me(row, status);
	}
	if ("cookie_expiration_time" == field) {
		displayChange_field_cookie_expiration_time(row, status);
	}
	if ("retrieve_password" == field) {
		displayChange_field_retrieve_password(row, status);
	}
	if ("new_users" == field) {
		displayChange_field_new_users(row, status);
	}
	if ("brute_force" == field) {
		displayChange_field_brute_force(row, status);
	}
	if ("brute_force_time_block" == field) {
		displayChange_field_brute_force_time_block(row, status);
	}
	if ("brute_force_attempts" == field) {
		displayChange_field_brute_force_attempts(row, status);
	}
	if ("enable_2fa" == field) {
		displayChange_field_enable_2fa(row, status);
	}
	if ("enable_2fa_expiration_time" == field) {
		displayChange_field_enable_2fa_expiration_time(row, status);
	}
}

function displayChange_field_session_expire(row, status) {
}

function displayChange_field_remember_me(row, status) {
}

function displayChange_field_cookie_expiration_time(row, status) {
}

function displayChange_field_retrieve_password(row, status) {
}

function displayChange_field_new_users(row, status) {
}

function displayChange_field_brute_force(row, status) {
}

function displayChange_field_brute_force_time_block(row, status) {
}

function displayChange_field_brute_force_attempts(row, status) {
}

function displayChange_field_enable_2fa(row, status) {
}

function displayChange_field_enable_2fa_expiration_time(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_app_settings_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_cookie_expiration_time" + iSeqRow).spinner({
    max: 1.0E+20,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_brute_force_time_block" + iSeqRow).spinner({
    max: 1.0E+20,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_brute_force_attempts" + iSeqRow).spinner({
    max: 1.0E+20,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_enable_2fa_expiration_time" + iSeqRow).spinner({
    max: 1.0E+20,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'app_settings_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

