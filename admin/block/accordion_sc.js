(function (blocks, editor, components, i18n, element) {
    var el = wp.element.createElement
    var registerBlockType = wp.blocks.registerBlockType
    var RichText = wp.editor.RichText
    var BlockControls = wp.editor.BlockControls
    var AlignmentToolbar = wp.editor.AlignmentToolbar
    var MediaUpload = wp.editor.MediaUpload
    var InspectorControls = wp.editor.InspectorControls
    var TextControl = components.TextControl
  
    wp.blocks.registerBlockType('gutenberg/faq-block', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
      title: i18n.__('Accordion', 'schema-blocks'), // The title of our block.
      description: i18n.__('A custom accordion block for displaying FAQ With Schema.'), // The description of our block.
      icon: 'format-aside', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
      category: 'schema-blocks', // The category of the block.
      supports: {
        align: true,
        alignWide: true
      },
      attributes: { // Necessary for saving block content.
        title: {
          type: 'array',
          source: 'children',
          selector: 'b'
        },
        faqanswer: {
          type: 'array',
          source: 'children',
          selector: 'p'
        }
      },
  
      edit: function (props) {
        var attributes = props.attributes
  
        return [
          el('div', { className: props.className },
            
            el('div', { className: 'akdesk-FAQ-content' },
              el(RichText, {
                key: 'editable',
                tagName: 'h3',
                placeholder: 'Accordion Head',
                keepPlaceholderOnFocus: true,
                value: attributes.title,
                onChange: function (newTitle) {
                  props.setAttributes({ title: newTitle })
                }
              }),
              el(RichText, {
                key: 'editable',
                tagName: 'p',
                placeholder: i18n.__('Accordion descriptive'),
                keepPlaceholderOnFocus: true,
                value: attributes.faqanswer,
                onChange: function (newfaqanswer) {
                  props.setAttributes({ faqanswer: newfaqanswer })
                }
              })
            )
          )
        ]
      },
  
      save: function (props) {
        var attributes = props.attributes
        var alignment = props.attributes.alignment
  
        return (
          el('div', {className: props.className, itemscope: "", itemprop: "mainEntity", itemtype: "https://schema.org/Question"},
            el('div', { className: 'tab-faq-head', itemprop: "name"},
              el(RichText.Content, {
                tagName: 'b',
                value: attributes.title
              }),
              ),
              el('div', { className: 'tab-faq-text', itemscope: "",itemprop: "acceptedAnswer",itemtype: "https://schema.org/Answer"},
              el(RichText.Content, {
                tagName: 'p',
                itemprop: 'name',
                value: attributes.faqanswer
              })
            )
          )
        )
      }
    })
  
  })(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
  )