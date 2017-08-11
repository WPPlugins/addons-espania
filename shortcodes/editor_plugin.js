(function() {

    tinymce.PluginManager.add('addons_espania_shortcodes_button', function( editor, url ) {
									
        editor.addButton( 'addons_espania_shortcodes_button', {
            text: 'Shortcodes',
            type: 'menubutton',
            tooltip: 'Add Shortcodes and Content',
            menu: [			
				{
                    text: 'Row / Columns',
                    icon: 'icon dashicons-text',
                    onclick: function() {
                        addonsEspaniaAddRow(editor);
                    }
                },
                {
                    text: 'Label',
                    icon: 'icon dashicons-tag',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Label',
                            body: [
                                {
                                    type: 'listbox',
                                    name: 'labelStyles',
                                    label: 'Style',
                                    'values': [
                                        {text: 'Default', value: 'default'},
                                        {text: 'Primary', value: 'primary'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Success', value: 'success'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Danger', value: 'danger'},
                                        {text: 'Custom', value: 'custom'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'labelTextColor',
                                    label: 'Text Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'labelBgColor',
                                    label: 'Background color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'labelClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[label ' +
                                'style="' + e.data.labelStyles + '" ' +
                                'text_color="' + e.data.labelTextColor + '" ' +
                                'bg_color="' + e.data.labelBgColor + '" ' +
                                'class="' + e.data.labelClass + '"' + ']' +
                                AddonsEspaniaGetSelected(editor) +
                                '[/label]');
                            }
                        });
                    }
                },
                {
                    text: 'Highlight',
                    icon: 'icon dashicons-admin-appearance',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Highlight',
                            body: [
                                {
                                    type: 'listbox',
                                    name: 'highlightStyles',
                                    label: 'Style',
                                    'values': [
                                        {text: 'Green', value: 'green'},
                                        {text: 'Violet', value: 'violet'},
                                        {text: 'Blue', value: 'blue'},
                                        {text: 'Lime', value: 'lime'},
                                        {text: 'Red', value: 'red'},
                                        {text: 'Black', value: 'black'},
                                        {text: 'Custom', value: 'custom'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'highlightTextColor',
                                    label: 'Text Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'highlightBgColor',
                                    label: 'Background color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'highlightClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[highlight ' +
                                'style="' + e.data.highlightStyles + '" ' +
                                'text_color="' + e.data.highlightTextColor + '" ' +
                                'bg_color="' + e.data.highlightBgColor + '" ' +
                                'class="' + e.data.highlightClass + '"' + ']' +
                                AddonsEspaniaGetSelected(editor) +
                                '[/highlight]');
                            }
                        });
                    }
                },
                {
                    text: 'Divider',
                    icon: 'icon dashicons-minus',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Divider',
                            body: [
                                {
                                    type: 'listbox',
                                    name: 'dividerStyles',
                                    label: 'Style',
                                    'values': [
                                        {text: 'Solid', value: 'solid'},
                                        {text: 'Dotted', value: 'dotted'},
                                        {text: 'Dashed', value: 'dashed'},
                                        {text: 'Double', value: 'double'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'dividerColor',
                                    label: 'Color(hex)',
                                    value: '#e9eef4'
                                },
                                {
                                    type: 'textbox',
                                    name: 'dividerHeight',
                                    label: 'Height',
                                    value: '1px'
                                },
                                {
                                    type: 'textbox',
                                    name: 'dividerClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[divider ' +
                                'style="' + e.data.dividerStyles + '" ' +
                                'color="' + e.data.dividerColor + '" ' +
                                'height="' + e.data.dividerHeight + '" ' +
                                'class="' + e.data.dividerClass + '"' + ']');
                            }
                        });
                    }
                },
                {
                    text: 'Abbreviation',
                    icon: 'icon dashicons-info',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Abbreviation',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'abbrTitle',
                                    label: 'Title',
                                    value: 'Title'
                                },
                                {
                                    type: 'textbox',
                                    name: 'abbrClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[abbr ' +
                                'title="' + e.data.abbrTitle + '" ' +
                                'class="' + e.data.abbrClass + '"' + ']' +
                                AddonsEspaniaGetSelected(editor) +
                                '[/abbr]');
                            }
                        });
                    }
                },
                {
                    text: 'Collapse',
                    icon: 'icon dashicons-menu',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Collapse',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'collapseTitle',
                                    label: 'Title',
                                    value: 'Collapse title'
                                },
                                {
                                    type: 'listbox',
                                    name: 'collapseStyle',
                                    label: 'Style',
                                    'values': [
                                        {text: 'Green', value: 'green'},
                                        {text: 'Violet', value: 'violet'},
                                        {text: 'Blue', value: 'blue'},
                                        {text: 'Lime', value: 'lime'},
                                        {text: 'Red', value: 'red'},
                                        {text: 'Black', value: 'black'},
                                        {text: 'Custom', value: 'custom'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'collapseOpen',
                                    label: 'Open by default?',
                                    'values': [
                                        {text: 'No', value: '0'},
                                        {text: 'Yes', value: '1'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'collapseTextColor',
                                    label: 'Text Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'collapseBgColor',
                                    label: 'Background color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'collapseBorderColor',
                                    label: 'Border color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'collapseClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[collapse ' +
                                'title="' + e.data.collapseTitle + '" ' +
                                'style="' + e.data.collapseStyle + '" ' +
                                'open="' + e.data.collapseOpen + '" ' +
                                'text_color="' + e.data.collapseTextColor + '" ' +
                                'bg_color="' + e.data.collapseBgColor + '" ' +
                                'border_color="' + e.data.collapseBorderColor + '" ' +
                                'class="' + e.data.collapseClass + '"' + ']<br><br>'+
                                AddonsEspaniaGetSelected(editor) + '<br><br>' +
                                '[/collapse]');
                            }
                        });
                    }
                },
                {
                    text: 'Tabs',
                    icon: 'icon dashicons-admin-settings',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Tab',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'tab1Title',
                                    label: 'Tab 1 Title',
                                    value: 'Tab 1 Title'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tab1Content',
                                    label: 'Tab 1 Content',
                                    multiline: true,
                                    minWidth: 300,
                                    minHeight: 70,
                                    value: 'Tab 1 Content'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tab2Title',
                                    label: 'Tab 2 Title',
                                    value: 'Tab 2 Title'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tab2Content',
                                    label: 'Tab 2 Content',
                                    multiline: true,
                                    minWidth: 300,
                                    minHeight: 70,
                                    value: 'Tab 2 Content'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tab3Title',
                                    label: 'Tab 3 Title',
                                    value: 'Tab 3 Title'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tab3Content',
                                    label: 'Tab 3 Content',
                                    multiline: true,
                                    minWidth: 300,
                                    minHeight: 70,
                                    value: 'Tab 3 Content'
                                },
                                {
                                    type: 'textbox',
                                    name: 'tabClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[espania_tabs ' +
                                'class="' + e.data.tabClass + '"' + ']<br><br>' +
                                '[espania_tab title="' + e.data.tab1Title + '"]<br>' + e.data.tab1Content + '<br>[/espania_tab]<br><br>' +
                                '[espania_tab title="' + e.data.tab2Title + '"]<br>' + e.data.tab2Content + '<br>[/espania_tab]<br><br>' +
                                '[espania_tab title="' + e.data.tab3Title + '"]<br>' + e.data.tab3Content + '<br>[/espania_tab]<br><br>' +
                                '[/espania_tabs]'
                                );
                            }
                        });
                    }
                },
                {
                    text: 'Margin',
                    icon: 'icon dashicons-align-center',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Margin',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'marginTop',
                                    label: 'Top',
                                    value: '0px'
                                },
                                {
                                    type: 'textbox',
                                    name: 'marginBottom',
                                    label: 'Bottom',
                                    value: '30px'
                                },
                                {
                                    type: 'textbox',
                                    name: 'marginClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[espania_margin ' +
                                'top="' + e.data.marginTop + '" ' +
                                'bottom="' + e.data.marginBottom + '" ' +
                                'class="' + e.data.marginClass + '"' + ']');
                            }
                        });
                    }
                },
				{
                    text: 'Button',
                    icon: 'icon dashicons-editor-removeformatting',
                    onclick: function() {
						editor.windowManager.open( {
							title: 'Button',
							body: [					
								{
									type: 'textbox',
									name: 'buttonText',
									label: 'Button text',
									value: 'Button'
								},	
								{
									type: 'textbox',
									name: 'buttonLink',
									label: 'Link',
									value: '#'
								},
								{
									type: 'listbox',
									name: 'buttonTarget',
									label: 'Target',
									'values': [
										{text: '_self', value: '_self'},
										{text: '_blank', value: '_blank'}
									]
								},
								{
									type: 'listbox',
									name: 'buttonSize',
									label: 'Size',
									'values': [
										{text: 'Normal', value: 'normal'},
										{text: 'Big', value: 'big'}
									]
								},
                                {
                                    type: 'textbox',
                                    name: 'buttonTextColor',
                                    label: 'Text Color(hex)',
                                    value: '#3d3d3d'
                                },
                                {
                                    type: 'textbox',
                                    name: 'buttonBgColor',
                                    label: 'Background Color(hex)',
                                    value: '#ffffff'
                                },
                                {
                                    type: 'textbox',
                                    name: 'buttonBorderColor',
                                    label: 'Border Color(hex)',
                                    value: '#3d3d3d'
                                },
                                {
                                    type: 'textbox',
                                    name: 'buttonHoverTextColor',
                                    label: 'Hover Text Color(hex)',
                                    value: '#ffffff'
                                },
                                {
                                    type: 'textbox',
                                    name: 'buttonHoverBgColor',
                                    label: 'Hover Background Color(hex)',
                                    value: '#3d3d3d'
                                },
                                {
                                    type: 'textbox',
                                    name: 'buttonHoverBorderColor',
                                    label: 'Hover Border Color(hex)',
                                    value: '#'
                                },
								{
									type: 'textbox',
									name: 'buttonClass',
									label: 'Extra class',
									value: ''
								}
							],
							
							onsubmit: function( e ) {
								editor.insertContent( '[espania_button ' +
													  'text="' + e.data.buttonText + '" ' +
													  'link="' + e.data.buttonLink + '" ' +
													  'target="' + e.data.buttonTarget + '" ' +
													  'size="' + e.data.buttonSize + '" ' +
                                                      'text_color="' + e.data.buttonTextColor + '" ' +
                                                      'bg_color="' + e.data.buttonBgColor + '" ' +
                                                      'border_color="' + e.data.buttonBorderColor + '" ' +
                                                      'hover_text_color="' + e.data.buttonHoverTextColor + '" ' +
                                                      'hover_bg_color="' + e.data.buttonHoverBgColor + '" ' +
                                                      'hover_border_color="' + e.data.buttonHoverBorderColor + '" ' +
													  'class="' + e.data.buttonClass + '"' + ']');
							}
						});
					}
                },
                {
                    text: 'Alert',
                    icon: 'icon dashicons-editor-textcolor',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Alert',
                            body: [
                                {
                                    type: 'listbox',
                                    name: 'alertStyle',
                                    label: 'Style',
                                    'values': [
                                        {text: 'Info', value: 'info'},
                                        {text: 'Success', value: 'success'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Danger', value: 'danger'},
                                        {text: 'Custom', value: 'custom'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'alertClose',
                                    label: 'Show Close Button?',
                                    'values': [
                                        {text: 'Yes', value: '1'},
                                        {text: 'No', value: '0'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'alertTextColor',
                                    label: 'Text Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'alertBgColor',
                                    label: 'Background Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'alertBorderColor',
                                    label: 'Border Color(hex)',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'alertClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[espania_alert ' +
                                'style="' + e.data.alertStyle + '" ' +
                                'close="' + e.data.alertClose + '" ' +
                                'text_color="' + e.data.alertTextColor + '" ' +
                                'bg_color="' + e.data.alertBgColor + '" ' +
                                'border_color="' + e.data.alertBorderColor + '" ' +
                                'class="' + e.data.alertClass + '"' + ']' +
                                AddonsEspaniaGetSelected(editor) +
                                '[/espania_alert]');
                            }
                        });
                    }
                },
                {
                    text: 'Classic blog',
                    icon: 'icon dashicons-admin-post',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Classic blog',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'blogCategory',
                                    label: 'Category',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'blogNumber',
                                    label: 'Number',
                                    value: '12'
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogOrderBy',
                                    label: 'Order posts by',
                                    'values': [
                                        {text: 'Published date', value: 'date'},
                                        {text: 'Menu order', value: 'menu_order'},
                                        {text: 'Modified date', value: 'modified'},
                                        {text: 'Author', value: 'author'},
                                        {text: 'Title', value: 'title'},
                                        {text: 'ID', value: 'ID'},
                                        {text: 'Random', value: 'rand'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogOrder',
                                    label: 'Posts order',
                                    'values': [
                                        {text: 'DESC', value: 'DESC'},
                                        {text: 'ASC', value: 'ASC'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogThumbnail',
                                    label: 'Thumbnail Size',
                                    'values': [
                                        {text: 'Normal', value: 'espania-normal'},
                                        {text: 'Big', value: 'espania-big'},
                                        {text: 'Square', value: 'espania-square'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogPanel',
                                    label: 'Show Panel?',
                                    'values': [
                                        {text: 'Show', value: '1'},
                                        {text: 'Hide', value: '0'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogLoadMore',
                                    label: 'Show "Load More"?',
                                    'values': [
                                        {text: 'Show', value: '1'},
                                        {text: 'Hide', value: '0'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'blogClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[espania_blog ' +
                                'category="' + e.data.blogCategory + '" ' +
                                'number="' + e.data.blogNumber + '" ' +
                                'order_by="' + e.data.blogOrderBy + '" ' +
                                'order="' + e.data.blogOrder + '" ' +
                                'thumb_size="' + e.data.blogThumbnail + '" ' +
                                'show_panel="' + e.data.blogPanel + '" ' +
                                'show_load_more="' + e.data.blogLoadMore + '" ' +
                                'class="' + e.data.blogClass + '"' + ']');
                            }
                        });
                    }
                },
                {
                    text: 'Alternative blog',
                    icon: 'icon dashicons-tablet',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Alternative blog',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'blogAltCategory',
                                    label: 'Category',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'blogAltNumber',
                                    label: 'Number',
                                    value: '12'
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogAltOrderBy',
                                    label: 'Order posts by',
                                    'values': [
                                        {text: 'Published date', value: 'date'},
                                        {text: 'Menu order', value: 'menu_order'},
                                        {text: 'Modified date', value: 'modified'},
                                        {text: 'Author', value: 'author'},
                                        {text: 'Title', value: 'title'},
                                        {text: 'ID', value: 'ID'},
                                        {text: 'Random', value: 'rand'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogAltOrder',
                                    label: 'Posts order',
                                    'values': [
                                        {text: 'DESC', value: 'DESC'},
                                        {text: 'ASC', value: 'ASC'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogAltLoadMore',
                                    label: 'Show "Load More"?',
                                    'values': [
                                        {text: 'Show', value: '1'},
                                        {text: 'Hide', value: '0'}
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'blogAltReadMore',
                                    label: 'Show "Read More"?',
                                    'values': [
                                        {text: 'Show', value: '1'},
                                        {text: 'Hide', value: '0'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'blogAltClass',
                                    label: 'Extra class',
                                    value: ''
                                }
                            ],

                            onsubmit: function( e ) {
                                editor.insertContent( '[espania_alt_blog ' +
                                'category="' + e.data.blogAltCategory + '" ' +
                                'number="' + e.data.blogAltNumber + '" ' +
                                'order_by="' + e.data.blogAltOrderBy + '" ' +
                                'order="' + e.data.blogAltOrder + '" ' +
                                'thumb_size="' + e.data.blogAltThumbnail + '" ' +
                                'show_load_more="' + e.data.blogAltLoadMore + '" ' +
                                'show_read_more="' + e.data.blogAltReadMore + '" ' +
                                'class="' + e.data.blogAltClass + '"' + ']');
                            }
                        });
                    }
                }
            ]
        });
    });


    /* ADD ROW */
    function addonsEspaniaAddRow(editor){
        editor.windowManager.open( {
            title: 'Insert Row',
            width : 445,
            height : 105,
            body: [
                {
                    type: 'listbox',
                    name: 'columns',
                    label: 'Columns',
                    'values': [
                        {text: '1/2 | 1/2', value: '2'},
                        {text: '1/3 | 1/3 | 1/3', value:'3'},
                        {text: '1/4 | 1/4 | 1/4 | 1/4', value:'4'},
                        {text: '1/6 | 1/6 | 1/6 | 1/6 | 1/6 | 1/6', value: '6'},
                        {text: '1/3 | 2/3', value:'1-3'},
                        {text: '2/4 | 1/4 | 1/4', value:'2-1-1'}
                    ]
                }
            ],
            onsubmit: function( e ) {
                 if(e.data.columns == '2'){
                    var insertContent = '[six_twelve]<br>Youre content...<br/>[/six_twelve]<br><br>[six_twelve]<br>Youre content...<br/>[/six_twelve]<br>';
                }
                if(e.data.columns == '3'){
                    var insertContent = '[four_twelve]<br>Youre content...<br/>[/four_twelve]<br><br>[four_twelve]<br>Youre content...<br/>[/four_twelve]<br><br>[four_twelve]<br>Youre content...<br/>[/four_twelve]<br>';
                }
                if(e.data.columns == '4'){
                    var insertContent = '[three_twelve]<br>Youre content...<br/>[/three_twelve]<br><br>[three_twelve]<br>Youre content...<br/>[/three_twelve]<br><br>[three_twelve]<br>Youre content...<br/>[/three_twelve]<br><br>[three_twelve]<br>Youre content...<br/>[/three_twelve]<br>';
                }
                if(e.data.columns == '6'){
                    var insertContent = '[two_twelve]<br>Youre content...<br/>[/two_twelve]<br><br>[two_twelve]<br>Youre content...<br/>[/two_twelve]<br><br>[two_twelve]<br>Youre content...<br/>[/two_twelve]<br><br>[two_twelve]<br>Youre content...<br/>[/two_twelve]<br><br>[two_twelve]<br>Youre content...<br/>[/two_twelve]<br><br>[two_twelve]<br>Youre content...<br/>[/two_twelve]<br>';
                }
                if(e.data.columns == '1-3'){
                    var insertContent = '[four_twelve]<br>Youre content...<br/>[/four_twelve]<br><br>[eight_twelve]<br>Youre content...<br/>[/eight_twelve]<br>';
                }
                if(e.data.columns == '2-1-1'){
                    var insertContent = '[six_twelve]<br>Youre content...<br/>[/six_twelve]<br><br>[three_twelve]<br>Youre content...<br/>[/three_twelve]<br><br>[three_twelve]<br>Youre content...<br/>[/three_twelve]<br>';
                }
                editor.insertContent('[row]<p>'+insertContent+'</p>[/row]<br>');
            }
        });
    }


    function AddonsEspaniaAddButtonClass() {
        jQuery('.mce-ico.mce-i-icon.dashicons-no-alt').parent().addClass('add-selected-icon');
    }


    function AddonsEspaniaGetSelected(editor) {

        // Grab the selected text from the content editor.
        var selectedText = 'Youre content...';

        if ( editor.selection.getContent().length > 0 ) {
            selectedText = editor.selection.getContent();
        }

        return selectedText;
    }

})();