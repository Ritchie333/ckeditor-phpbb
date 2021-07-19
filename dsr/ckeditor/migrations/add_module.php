<?php

namespace dsr\ckeditor\migrations;

class add_module extends \phpbb\db\migration\migration
{
    static public function depends_on()
    {
        return ['\dsr\ckeditor\migrations\add_bbcode'];
    }

	public function update_data()
	{
		return [
            ['config.add', ['dsr_cke_status', 1]],
            ['config.add', ['dsr_cke_cache_time', 0]],
            ['config.add', ['dsr_cke_imgur_client_id', '']],
            ['config.add', ['dsr_cke_code_snippet_theme', '']],

            ['config_text.add', ['dsr_cke_normal_editor_toolbar_groups', "[
                { 'name': 'basicstyles' },
                { 'name': 'styles' },
                { 'name': 'colors' },
                { 'name': 'paragraph',   'groups': [ 'align', 'list', 'indent', 'blocks', 'bidi' ] },
                { 'name': 'editing',     'groups': [ 'find', 'selection', 'spellchecker', 'cleanup', 'undo'  ] },
                { 'name': 'forms' },
                { 'name': 'links' },
                { 'name': 'insert' },
                { 'name': 'others',      'groups': [ 'customBBcode' ] },
                { 'name': 'document',    'groups': [ 'tools', 'mode', 'document', 'doctools' ] }
            ]"]],
            ['config_text.add', ['dsr_cke_normal_editor_remove_buttons', 'BGColor,Anchor,Font,Indent,Outdent']],
            ['config_text.add', ['dsr_cke_quick_editor_toolbar_groups', "[
                { 'name': 'basicstyles' },
                { 'name': 'styles' },
                { 'name': 'colors' },
                { 'name': 'links' },
                { 'name': 'insert' },
                { 'name': 'document',    'groups': [ 'tools', 'mode', 'document', 'doctools' ] }
            ]"]],
            ['config_text.add', ['dsr_cke_quick_editor_remove_buttons', 'Subscript,Superscript,BGColor,Anchor,Font,Indent,Outdent,Table,HorizontalRule']],
            ['config_text.add', ['dsr_cke_code_snippet_languages', '']],

            // Add a parent module (ACP_DEMO_TITLE) to the Extensions tab (ACP_CAT_DOT_MODS)
            ['module.add', [
                'acp',
                'ACP_CAT_DOT_MODS',
                'ACP_DSR_CKE_TITLE'
            ]],

            // Add our main_module to the parent module (ACP_DEMO_TITLE)
            ['module.add', [
                'acp',
                'ACP_DSR_CKE_TITLE',
                [
                    'module_basename'	=> '\dsr\ckeditor\acp\acp_module',
                    'modes'				=> ['settings'],
                ]
            ]],
        ];
	}

    public function revert_data()
    {
        return [
            ['config.remove', [
                'dsr_cke_status',
                'dsr_cke_cache_time',
                'dsr_cke_imgur_client_id',
                'dsr_cke_code_snippet_theme',
            ]],

            ['config_text.remove', [
                'dsr_cke_normal_editor_toolbar_groups',
                'dsr_cke_normal_editor_remove_buttons',
                'dsr_cke_quick_editor_toolbar_groups',
                'dsr_cke_quick_editor_remove_buttons',
                'dsr_cke_code_snippet_languages',
            ]],

            ['module.remove', [
                'acp',
                'ACP_DSR_CKE_TITLE',
                [
                    'module_basename'	=> '\dsr\ckeditor\acp\acp_module',
                    'modes'				=> ['settings'],
                ]
            ]],
            ['module.remove', [
                'acp',
                'ACP_CAT_DOT_MODS',
                'ACP_DSR_CKE_TITLE'
            ]],
        ];
    }
}