(function (blocks, editor, components, i18n, element) {
  var el = wp.element.createElement;
  var el = wp.element.createElement
  var registerBlockType = wp.blocks.registerBlockType
  var RichText = wp.editor.RichText
  var BlockControls = wp.editor.BlockControls
  var AlignmentToolbar = wp.editor.AlignmentToolbar
  var MediaUpload = wp.editor.MediaUpload
  var InspectorControls = wp.editor.InspectorControls
  var TextControl = components.TextControl

  wp.blocks.registerBlockType('gutenberg/testimonial-block', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
    title: i18n.__('Testimonial'), // The title of our block.
    description: i18n.__('A custom block for displaying Testimonial.'), // The description of our block.
    icon: 'format-quote', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
    category: 'schema-blocks', // The category of the block.
    supports: {
      align: true,
      alignWide: true
    },
    attributes: { // Necessary for saving block content.
      title: {
        type: 'array',
        source: 'children',
        selector: 'h3'
      },
      subtitle: {
        type: 'array',
        source: 'children',
        selector: 'h5'
      },
      bio: {
        type: 'array',
        source: 'children',
        selector: 'p'
      },
      mediaID: {
        type: 'number'
      },
      mediaURL: {
        type: 'string',
        source: 'attribute',
        selector: 'img',
        attribute: 'src'
      },
      alignment: {
        type: 'string',
        default: 'center'
      }
    },

    edit: function (props) {
      var attributes = props.attributes
      var alignment = props.attributes.alignment

      var onSelectImage = function (media) {
        return props.setAttributes({
          mediaURL: media.url,
          mediaID: media.id
        })
      }

      function onChangeAlignment (newAlignment) {
        props.setAttributes({ alignment: newAlignment })
      }

      return [
        el(BlockControls, { key: 'controls' }, // Display controls when the block is clicked on.
          el('div', { className: 'components-toolbar' },
            el(MediaUpload, {
              onSelect: onSelectImage,
              type: 'image',
              render: function (obj) {
                return el(components.Button, {
                  className: 'components-icon-button components-toolbar__control',
                  onClick: obj.open
                },
                // Add Dashicon for media upload button.
                el('svg', { className: 'dashicon dashicons-edit', width: '20', height: '20' },
                  el('path', { d: 'M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z' })
                ))
              }
            })
          ),
          // Display alignment toolbar within block controls.
          el(AlignmentToolbar, {
            value: alignment,
            onChange: onChangeAlignment
          })
        ),
        el('div', { className: props.className , style: { textAlign: alignment } },
          el('div', {
            className: attributes.mediaID ? 'akdesk-schema-block-image image-active' : 'akdesk-block-image image-inactive',
          },
          el(MediaUpload, {
            onSelect: onSelectImage,
            type: 'image',
            value: attributes.mediaID,
            render: function (obj) {
              return el(components.Button, {
                className: attributes.mediaID ? 'image-button' : 'button button-large',
                onClick: obj.open
              },
              !attributes.mediaID ? i18n.__('Upload Image') : el('img', { src: attributes.mediaURL })
              )
            }
          })
          ),
          el('div', { className: 'akdesk-schema-block-content', style: { textAlign: alignment } },
            el(RichText, {
              key: 'editable',
              tagName: 'p',
              placeholder: 'Add testimonial text...',
              keepPlaceholderOnFocus: true,
              value: attributes.title,
              onChange: function (newTitle) {
                props.setAttributes({ title: newTitle })
              }
            }),
            el(RichText, {
              tagName: 'p',
              placeholder: i18n.__('Add Name'),
              keepPlaceholderOnFocus: true,
              value: attributes.subtitle,
              onChange: function (newSubtitle) {
                props.setAttributes({ subtitle: newSubtitle })
              }
            }),
            el(RichText, {
              key: 'editable',
              tagName: 'p',
              placeholder: i18n.__('Citation'),
              keepPlaceholderOnFocus: true,
              value: attributes.bio,
              onChange: function (newBio) {
                props.setAttributes({ bio: newBio })
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
        el('div', { className: props.className },
          el('div', { className: 'akdesk-schema-block-image', style: { textAlign: attributes.alignment }},
            el('img', { src: attributes.mediaURL })
          ),
          el('div', { className: 'akdesk-schema-block-content',style: { textAlign: attributes.alignment }},
            el(RichText.Content, {
              tagName: 'p',
              className: 'testimonial-content-block-content',
              value: attributes.title
            }),
            el(RichText.Content, {
              tagName: 'i',
              className: 'testimonial-name-block-content',
              value: attributes.subtitle
            }),
            el(RichText.Content, {
              tagName: 'p',
              className: 'testimonial-Citation-block-content',
              value: attributes.bio
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