CKEDITOR.config.codeSnippet_languages={},CKEDITOR.plugins.add("codesnippet",{requires:"bbcode",lang:"ar,az,bg,ca,cs,da,de,de-ch,el,en,en-au,en-gb,eo,es,es-mx,et,eu,fa,fi,fr,fr-ca,gl,he,hr,hu,id,it,ja,km,ko,ku,lt,lv,nb,nl,no,oc,pl,pt,pt-br,ro,ru,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",icons:"codesnippet",hidpi:!0,init:function(s){var p=s.config.codeSnippet_languages;s.ui.addButton("codesnippet",{label:s.lang.codesnippet.button,command:"codeSnippetView",toolbar:"insert,10"}),s.addCommand("codeSnippetView",new CKEDITOR.dialogCommand("codeSnippetView")),s.addCommand("codesnippet",{exec:function(e){var t,n,i;"wysiwyg"===e.mode?(i=e.getSelectedHtml().getHtml(),e.insertHtml("[code]"+i+"[/code]")):(n=(t=jQuery("textarea.cke_source"))[0].selectionStart,e=t[0].selectionEnd,i=t.val(),n&&e&&i&&t.val(i.substring(0,n)+"[code]"+i.substring(n,e)+"[/code]"+i.substring(e)))},modes:{wysiwyg:1,source:1}}),CKEDITOR.dialog.add("codeSnippetView",function(e){var t,n=p,i=s.lang.codesnippet,o=document.documentElement.clientHeight,a=[];for(t in a.push([s.lang.common.notSet,""]),n){var d=n[t];d.hasOwnProperty("label")&&a.push([d.label,d.lang])}var c=CKEDITOR.document.getWindow().getViewPaneSize(),l=Math.min(c.width-70,800),c=c.height/1.5;return o<650&&(c=o-220),{title:i.title,minHeight:200,resizable:CKEDITOR.DIALOG_RESIZE_NONE,contents:[{id:"codeSnippetView",elements:[{id:"lang",type:"select",label:i.language,items:a},{id:"code",type:"textarea",label:i.codeContents,required:!0,validate:CKEDITOR.dialog.validate.notEmpty(i.emptySnippetError),inputStyle:"cursor:auto;width:"+l+"px;height:"+c+"px;tab-size:4;text-align:left;",class:"cke_source"}]}],onOk:function(){var e=this.getValueOf("codeSnippetView","lang"),t=this.getValueOf("codeSnippetView","code"),e="code"+(e?"="+e:"");s.insertHtml("["+e+"]"+t+"[/code]")}}})}});