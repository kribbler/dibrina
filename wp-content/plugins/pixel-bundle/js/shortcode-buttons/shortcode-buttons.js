(function() {
   tinymce.create('tinymce.plugins.section', {
      init : function(ed, url) {
         ed.addButton('section', {
            title : 'Section Shortcode',
            image : url+'/button-icons/shortcode-section.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Section Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=mygallery-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Section",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('section', tinymce.plugins.section);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="mygallery-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="section-id"><strong>id</strong></label></th>\
				<td><input type="text" name="id" id="section-id" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Give section a unique ID for anchor reference.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-toparrowcolor"><strong>toparrowcolor</strong></label></th>\
				<td><input type="text" name="toparrowcolor" id="section-toparrowcolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter color in hex. E.g. #000000</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-bottomarrowcolor"><strong>bottomarrowcolor</strong></label></th>\
				<td><input type="text" name="bottomarrowcolor" id="section-bottomarrowcolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter color in hex. E.g. #000000</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-width"><strong>width</strong></label></th>\
				<td><select name="width" id="section-width">\
					<option value="standard">standard</option>\
					<option value="full">full</option>\
					<option value="sidebar">sidebar</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="section-background"><strong>background</strong></label></th>\
				<td><select name="background" id="section-background">\
					<option value="white">white</option>\
					<option value="light">light</option>\
					<option value="dark">dark</option>\
					<option value="custom-white">custom-white</option>\
					<option value="custom-dark">custom-dark</option>\
					<option value="image">image</option>\
					<option value="image-fixed">image-fixed</option>\
					<option value="image-parallax">image-parralax</option>\
					<option value="video">video</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="section-backgroundcolor"><strong>backgroundcolor</strong></label></th>\
				<td><input type="text" name="backgroundcolor" id="section-backgroundcolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Custom background color in hex. E.g. #000000</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="section-paddingtop" value="50" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Manually change space above section in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="section-paddingbottom" value="50" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Manually change space below section in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-border"><strong>border</strong></label></th>\
				<td><select name="border" id="section-border">\
					<option value="">no border</option>\
					<option value="line">line</option>\
					<option value="line-top">line-top</option>\
					<option value="line-bottom">line-bottom</option>\
					<option value="shadow">shadow</option>\
					<option value="shadow-top">shadow-top</option>\
					<option value="shadow-bottom">shadow-bottom</option>\
					<option value="lineshadow">lineshadow</option>\
					<option value="lineshadow-top">lineshadow-top</option>\
					<option value="lineshadow-bottom">lineshadow-bottom</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="section-imageurl"><strong>imageurl</strong></label></th>\
				<td><input type="text" name="imageurl" id="section-imageurl" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL (inc http//:)</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-oggurl"><strong>oggurl</strong></label></th>\
				<td><input type="text" name="oggurl" id="section-oggurl" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">URL of ogg video file (inc http//:). Video backgrounds only.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-webmurl"><strong>webmurl</strong></label></th>\
				<td><input type="text" name="webmurl" id="section-webmurl" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">URL of webm video file (inc http//:). Video backgrounds only.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-mp4url"><strong>mp4url</strong></label></th>\
				<td><input type="text" name="mp4url" id="section-mp4url" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">URL of mp4 video file (inc http//:). Video backgrounds only.</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-overlaycolor"><strong>overlaycolor</strong></label></th>\
				<td><input type="text" name="overlaycolor" id="section-overlaycolor" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Hex or <a href="http://hex2rgba.devoth.com">RGBA</a> (for image and video backgrounds) color. E.g. #000000 or rgba(32, 197, 150, 0.5).</div></td>\
			</tr>\
			<tr>\
				<th><label for="section-ratio"><strong>Parallax Ratio</strong></label></th>\
				<td><input type="text" name="ratio" id="section-ratio" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">E.g. 0.5 - half-speed scroll, 1 - no effect, 2 - double speed scroll.</div>\
				</td>\
			</tr>\
		</table>\
		<p class="submit section-shortcode" id="manu">\
			<input type="button" id="section-submit" class="button-primary" value="Insert Section" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		
		
		
		// handles the click event of the submit button
		form.find('#section-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'id'    		: '',
				'toparrowcolor' : '',
				'bottomarrowcolor' : '',
				'width'    		: 'standard',
				'background' 	: 'white',
				'backgroundcolor' 	: '',
				'paddingtop'  	: '50',
				'paddingbottom' : '50',
				'border'    	: '',
				'imageurl'    	: '',
				'oggurl' 		: '',
				'webmurl' 		: '',
				'mp4url' 		: '',
				'overlaycolor'  : '',
				'ratio'    		: ''
				};
			var shortcode = '[section';
			var type = table.find('#section-type').val();
			
			for( var index in options) {
				var value = table.find('#section-' + index).val();
				// attaches the attribute to the shortcode only if it's different from the default value
				
				if ( value !== options[index] ) {
					shortcode += ' ' + index + '="' + value + '"';
				}
			    
			}
			shortcode += '] Content [/section]';
				
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.column', {
      init : function(ed, url) {
         ed.addButton('column', {
            title : 'Column Shortcode',
            image : url+'/button-icons/shortcode-column.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Column Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=column-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Column",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('column', tinymce.plugins.column);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="column-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="column-type"><strong>type</strong></label></th>\
				<td><select name="type" id="column-type">\
					<option value="nonest">standard</option>\
					<option value="nest1">nested</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="column-width"><strong>width</strong></label></th>\
				<td><select name="width" id="column-width">\
					<option value="1">1</option>\
					<option value="2">2</option>\
					<option value="3">3</option>\
					<option value="4" selected>4</option>\
					<option value="5">5</option>\
					<option value="6">6</option>\
					<option value="7">7</option>\
					<option value="8">8</option>\
					<option value="9">9</option>\
					<option value="10">10</option>\
					<option value="11">11</option>\
					<option value="12">12</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="column-offset"><strong>offset</strong></label></th>\
				<td><select name="offset" id="column-offset">\
					<option value="0">0</option>\
					<option value="1">1</option>\
					<option value="2">2</option>\
					<option value="3">3</option>\
					<option value="4">4</option>\
					<option value="5">5</option>\
					<option value="6">6</option>\
					<option value="7">7</option>\
					<option value="8">8</option>\
					<option value="9">9</option>\
					<option value="10">10</option>\
					<option value="11">11</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="column-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="column-paddingtop" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space above column in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="column-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="column-paddingbottom" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space below column in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="column-paddingside"><strong>paddingside</strong></label></th>\
				<td><input type="text" name="paddingside" id="column-paddingside" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space at each side of column in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="column-delay"><strong>delay</strong></label></th>\
				<td><input type="text" name="delay" id="column-delay" value="0" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Time column takes to appear when within screen view.</div></td>\
			</tr>\
			<tr>\
				<th><label for="column-animation"><strong>animation</strong></label></th>\
				<td><select name="animation" id="column-animation">\
					<option value="fade-in">fade-in</option>\
					<option value="bounce-in">bounce-in</option>\
					<option value="move-left">move-left</option>\
					<option value="move-right">move-right</option>\
					<option value="move-down">move-down</option>\
					<option value="move-up">move-up</option>\
					<option value="move-up-short">move-up-short</option>\
					<option value="rotate-in">rotate-in</option>\
					<option value="roll-in">roll-in</option>\
					<option value="pull-up">pull-up</option>\
				</select><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Animation as column appears in view (after any delay).</div>\</td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="column-submit" class="button-primary" value="Insert Column" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#column-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'width'    		: '4',
				'offset' 		: '0',
				'paddingtop'  	: '',
				'paddingbottom' : '',
				'paddingside'   : '',
				'delay' 		: '0',
				'animation'     : 'fade-in'
				};
			var shortcode = '[column';
			var type = table.find('#column-type').val();
			
			if ( type == 'nest1') {
					shortcode += '1';
				}
			if ( type == 'nest2') {
					shortcode += '2';
				}
			
			for( var index in options) {
				var value = table.find('#column-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			if ( type == 'nest1') {
					shortcode += '] Content [/column1]';
				}
			
			if ( type == 'nest2') {
					shortcode += '] Content [/column2]';
				}
				
			if ( type != 'nest1' && type != 'nest2' ) {
			shortcode += '] Content [/column]';
			}
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.newrow', {
      init : function(ed, url) {
         ed.addButton('newrow', {
            title : 'Row Separator Shortcode',
            image : url+'/button-icons/shortcode-newrow.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Row Separator Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=newrow-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "newrow",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('newrow', tinymce.plugins.newrow);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="newrow-form"><table id="mygallery-table" class="form-table">\
					</table>\
		<p class="submit">\
			<input type="button" id="newrow-submit" class="button-primary" value="Insert Row Separator" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#newrow-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				
				};
			var shortcode = '[newrow';
			
			for( var index in options) {
				var value = table.find('#newrow-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.header', {
      init : function(ed, url) {
         ed.addButton('header', {
            title : 'Header Shortcode',
            image : url+'/button-icons/shortcode-header.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Header Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=header-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Header",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('header', tinymce.plugins.header);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="header-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="header-type"><strong>type</strong></label></th>\
				<td><select name="type" id="header-type">\
					<option value="standard">standard</option>\
					<option value="small">small</option>\
					<option value="small-left">small-left</option>\
					<option value="large">large</option>\
					<option value="left">left</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="header-weight"><strong>weight</strong> </label></th>\
				<td><select name="weight" id="header-weight">\
					<option value="">standard</option>\
					<option value="100">thin</option>\
					<option value="600">semi-bold</option>\
					<option value="700">bold</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="header-size"><strong>size</strong></label></th>\
				<td><input type="text" name="size" id="header-size" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a numerical font size for the header. E.g. 20. Leave blank for the standard size.</div></td>\
			</tr>\
			<tr>\
				<th><label for="header-font"><strong>font</strong></label></th>\
				<td><input type="text" name="font" id="header-font" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a custom font family. E.g. Helvetica. Leave blank for the standard font.</div></td>\
			</tr>\
			<tr>\
				<th><label for="header-color"><strong>color</strong></label></th>\
				<td><input type="text" name="color" id="header-color" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Custom hex color. E.g. #000000. Leave blank for the standard color.</div></td>\
			</tr>\
			<tr>\
				<th><label for="header-lineheight"><strong>lineheight</strong></label></th>\
				<td><input type="text" name="lineheight" id="header-lineheight" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a lineheight for the header. E.g. 1.6. Leave blank for the standard lineheight.</div></td>\
			</tr>\
			<tr>\
				<th><label for="header-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="header-paddingtop" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space above line/header in pixels. Leave blank for the standard padding.</div></td>\
			</tr>\
			<tr>\
				<th><label for="header-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="header-paddingbottom" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space below line/header in pixels. Leave blank for the standard padding.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="header-submit" class="button-primary" value="Insert Header" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#header-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    	: 'standard',
				'size' : '',
				'font' : '',
				'color' : '',
				'weight' : '',
				'lineheight' : '',
				'paddingtop' 	: '',
				'paddingbottom' : ''
				};
			var shortcode = '[header';
			
			for( var index in options) {
				var value = table.find('#header-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += '] Content [/header]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.text', {
      init : function(ed, url) {
         ed.addButton('text', {
            title : 'Text Block Shortcode',
            image : url+'/button-icons/shortcode-text.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Text Block Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=text-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Text",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('text', tinymce.plugins.text);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="text-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="text-align"><strong>align</strong></label></th>\
				<td><select name="align" id="text-align">\
					<option value="left">left</option>\
					<option value="right">right</option>\
					<option value="center">center</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="text-weight"><strong>weight</strong> </label></th>\
				<td><select name="weight" id="text-weight">\
					<option value="">standard</option>\
					<option value="100">thin</option>\
					<option value="600">semi-bold</option>\
					<option value="700">bold</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="text-size"><strong>size</strong></label></th>\
				<td><input type="text" name="size" id="text-size" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a numerical font size. E.g. 20. Leave blank for the standard size.</div></td>\
			</tr>\
			<tr>\
				<th><label for="text-font"><strong>font</strong></label></th>\
				<td><input type="text" name="font" id="text-font" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a custom font family. E.g. Helvetica. Leave blank for the standard font.</div></td>\
			</tr>\
			<tr>\
				<th><label for="text-color"><strong>color</strong></label></th>\
				<td><input type="text" name="color" id="text-color" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Custom hex color. E.g. #000000. Leave blank for the standard color.</div></td>\
			</tr>\
			<tr>\
				<th><label for="text-lineheight"><strong>lineheight</strong></label></th>\
				<td><input type="text" name="lineheight" id="text-lineheight" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a lineheight for the header. E.g. 1.6. Leave blank for the standard lineheight.</div></td>\
			</tr>\
			<tr>\
				<th><label for="text-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="text-paddingtop" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space above line/header in pixels. Leave blank for the standard padding.</div></td>\
			</tr>\
			<tr>\
				<th><label for="text-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="text-paddingbottom" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space below line/header in pixels. Leave blank for the standard padding.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="text-submit" class="button-primary" value="Insert Text Block" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#text-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'align'    		: 'left',
				'size' : '',
				'font' : '',
				'color' : '',
				'weight' : '',
				'lineheight' : '',
				'paddingtop' 	: '',
				'paddingbottom' : ''
				};
			var shortcode = '[text';
			
			for( var index in options) {
				var value = table.find('#text-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += '] Content [/text]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.pomedia', {
      init : function(ed, url) {
         ed.addButton('pomedia', {
            title : 'Media Shortcode',
			image : url+'/button-icons/shortcode-po-media.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Media Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=pomedia-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Media",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('pomedia', tinymce.plugins.pomedia);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="pomedia-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="pomedia-type"><strong>type</strong></label></th>\
				<td><select name="type" id="pomedia-type">\
					<option value="image">image</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="pomedia-imageurl"><strong>imageurl</strong></label></th>\
				<td><input type="text" name="imageurl" id="pomedia-imageurl" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL (inc http//:)</div></td>\
			</tr>\
			<tr>\
				<th><label for="pomedia-height"><strong>height</strong></label></th>\
				<td><input type="text" name="height" id="pomedia-height" value="200" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Height of image in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="pomedia-imagealt"><strong>imagealt</strong></label></th>\
				<td><input type="text" name="imagealt" id="pomedia-imagealt" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Give your image a name for better SEO.</div></td>\
			</tr>\
			<tr>\
				<th><label for="pomedia-group"><strong>group</strong> (optional)</label></th>\
				<td><input type="text" name="group" id="pomedia-group" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Images under the same group are shown together in the viewer.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="pomedia-submit" class="button-primary" value="Insert Media" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#pomedia-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    		: '',
				'imageurl' 		: '',
				'height'    	: '200',
				'imagealt'    	: '',
				'group' 		: ''
				};
			var shortcode = '[media';
			
			for( var index in options) {
				var value = table.find('#pomedia-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.po_button', {
      init : function(ed, url) {
         ed.addButton('po_button', {
            title : 'Button Shortcode',
            image : url+'/button-icons/shortcode-button.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Button Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=po_button-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "po_button",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('po_button', tinymce.plugins.po_button);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="po_button-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="po_button-type"><strong>type</strong></label></th>\
				<td><select name="type" id="po_button-type">\
					<option value="">standard</option>\
					<option value="anchor">anchor</option>\
				</select><br /></td>\
			<tr>\
			<tr>\
				<th><label for="po_button-style"><strong>style</strong></label></th>\
				<td><select name="style" id="po_button-style">\
					<option value="standard">standard</option>\
					<option value="top">top</option>\
					<option value="banner">banner</option>\
				</select><br /></td>\
			<tr>\
			<tr>\
				<th><label for="po_button-position"><strong>position</strong></label></th>\
				<td><select name="position" id="po_button-position">\
					<option value="">standard</option>\
					<option value="left">left</option>\
				</select><br /></td>\
			<tr>\
			<tr>\
				<th><label for="po_button-color"><strong>color</strong></label></th>\
				<td><select name="color" id="po_button-color">\
					<option value="light">light</option>\
					<option value="white">white</option>\
					<option value="dark">dark</option>\
				</select><br /></td>\
			<tr>\
				<th><label for="po_button-link"><strong>link</strong></label></th>\
				<td><input type="text" name="link" id="po_button-link" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">webpage url after button is clicked.</div></td>\
			</tr>\
			<tr>\
				<th><label for="po_button-icon"><strong>icon</strong></label></th>\
				<td><input type="text" name="icon" id="po_button-icon" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-check. Only for top, left and banner styles.</div></td>\
			</tr>\
			<tr>\
				<th><label for="po_button-width"><strong>width</strong> (optional)</label> </th>\
				<td><input type="text" name="width" id="po_button-width" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a custom width value (in pixels) to overide the standard fluid width.</div></td>\
			</tr>\
			<tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="po_button-submit" class="button-primary" value="Insert Button" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#po_button-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type' 		: '',
				'style' 		: 'standard',
				'position' 		: '',
				'color' 		: 'light',
				'icon'  		: '',
				'link'  		: '',
				'width'		  	: '',
				};
			var shortcode = '[button';
			
			for( var index in options) {
				var value = table.find('#po_button-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += '] Content [/button]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.iconbox', {
      init : function(ed, url) {
         ed.addButton('iconbox', {
            title : 'Icon Box Shortcode',
            image : url+'/button-icons/shortcode-iconbox.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Icon Box Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=iconbox-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "iconbox",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('iconbox', tinymce.plugins.iconbox);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="iconbox-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="iconbox-type"><strong>type</strong></label></th>\
				<td><select name="type" id="iconbox-type">\
					<option value="">icon-box-top</option>\
					<option value="icon-box-left">icon-box-left</option>\
					<option value="icon-top">icon-top</option>\
					<option value="icon-left">icon-left</option>\
					<option value="icon-title">icon-title</option>\
					<option value="icon-float">icon-float</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-character"><strong>character</strong></label></th>\
				<td><input type="text" name="character" id="iconbox-character" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Entering a character overides the icon.</div></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-icon"><strong>icon</strong></label></th>\
				<td><input type="text" name="icon" id="iconbox-icon" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-check</div></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-title"><strong>title</strong></label></th>\
				<td><input type="text" name="title" id="iconbox-title" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-titlesize"><strong>titlesize</strong></label></th>\
				<td><input type="text" name="titlesize" id="iconbox-titlesize" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">In pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-titleweight"><strong>titleweight</strong></label></th>\
				<td><select name="titleweight" id="iconbox-titleweight">\
					<option value="300">300</option>\
					<option value="" selected>standard</option>\
					<option value="600">600</option>\
					<option value="bold">bold</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-size"><strong>size</strong></label></th>\
				<td><input type="text" name="size" id="iconbox-size" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">In pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="iconbox-weight"><strong>weight</strong></label></th>\
				<td><select name="weight" id="iconbox-weight">\
					<option value="300">300</option>\
					<option value="" selected>standard</option>\
					<option value="600">600</option>\
					<option value="bold">bold</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="iconbox-submit" class="button-primary" value="Insert Iconbox" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#iconbox-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    		: '',
				'character'     : '',
				'icon'  		: '',
				'title' 		: '',
				'titlesize'   	: '',
				'titleweight'   : '',
				'size'   		: '',
				'weight'   		: ''
				};
			var shortcode = '[iconbox';
							  
			for( var index in options) {
				var value = table.find('#iconbox-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += '] Content [/iconbox]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.count', {
      init : function(ed, url) {
         ed.addButton('count', {
            title : 'Count Shortcode',
            image : url+'/button-icons/shortcode-count.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Count Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=count-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "count",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('count', tinymce.plugins.count);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="count-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="count-from"><strong>from</strong></label></th>\
				<td><input type="text" name="from" id="count-from" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Where count should start.</div></td>\
			</tr>\
			<tr>\
				<th><label for="count-to"><strong>to</strong></label></th>\
				<td><input type="text" name="to" id="count-to" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Where count should end.</div></td>\
			</tr>\
			<tr>\
				<th><label for="count-speed"><strong>speed</strong></label></th>\
				<td><input type="text" name="speed" id="count-speed" value="3000" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Speed of count (in milliseconds).</div></td>\
			</tr>\
			<tr>\
				<th><label for="count-icon"><strong>icon</strong></label></th>\
				<td><input type="text" name="icon" id="count-icon" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-eye</div></td>\
			</tr>\
			<tr>\
				<th><label for="count-icondelay"><strong>icondelay</strong></label></th>\
				<td><input type="text" name="icondelay" id="count-icondelay" value="0" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Time icon takes to appear when within screen view.</div></td>\
			</tr>\
			<tr>\
				<th><label for="count-iconanimation"><strong>iconanimation</strong></label></th>\
				<td><select name="iconanimation" id="count-iconanimation">\
					<option value="fade-in">fade-in</option>\
					<option value="bounce-in">bounce-in</option>\
					<option value="move-left">move-left</option>\
					<option value="move-right">move-right</option>\
					<option value="move-down">move-down</option>\
					<option value="move-up">move-up</option>\
					<option value="move-up-short">move-up-short</option>\
					<option value="rotate-in">rotate-in</option>\
					<option value="roll-in">roll-in</option>\
					<option value="pull-up">pull-up</option>\
				</select><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Type of animation once icon appears in view (after any delay).</div>\</td>\
			</tr>\
			<tr>\
				<th><label for="count-textanimation"><strong>textanimation</strong></label></th>\
				<td><select name="textanimation" id="count-textanimation">\
					<option value="fade-in">fade-in</option>\
					<option value="bounce-in">bounce-in</option>\
					<option value="move-left">move-left</option>\
					<option value="move-right">move-right</option>\
					<option value="move-down">move-down</option>\
					<option value="move-up">move-up</option>\
					<option value="move-up-short">move-up-short</option>\
					<option value="rotate-in">rotate-in</option>\
					<option value="roll-in">roll-in</option>\
					<option value="pull-up">pull-up</option>\
				</select><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Type of animation once text appears in view (after any delay).</div>\</td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="count-submit" class="button-primary" value="Insert Count" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#count-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'from'    		: '',
				'to' 			: '',
				'speed'  		: '3000',
				'icon' 			: '',
				'icondelay'   	: '0',
				'iconanimation' : 'fade-in',
				'textanimation' : 'fade-in'
				};
			var shortcode = '[count';
			
			for( var index in options) {
				var value = table.find('#count-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += '] Content [/count]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.progress', {
      init : function(ed, url) {
         ed.addButton('progress', {
            title : 'Progress Bar Shortcode',
            image : url+'/button-icons/shortcode-progressbar.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Progress Bar Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=progress-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "progress",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('progress', tinymce.plugins.progress);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="progress-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="progress-type"><strong>type</strong></label></th>\
				<td><select name="type" id="progress-type">\
					<option value="">horizontal</option>\
					<option value="circular">Circular</option>\
				</select><br />\
				</td>\
			</tr>\
			<tr>\
				<th><label for="progress-title"><strong>title</strong></label></th>\
				<td><input type="text" name="title" id="progress-title" value="" /><br />\
				</td>\
			</tr>\
			<tr>\
				<th><label for="progress-value"><strong>value</strong></label></th>\
				<td><input type="text" name="value" id="progress-value" value="0" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Between 0 and 100.</div></td>\
			</tr>\
			<tr>\
				<th><label for="progress-icon"><strong>icon</strong></label></th>\
				<td><input type="text" name="icon" id="progress-icon" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-eye</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="progress-submit" class="button-primary" value="Insert Progress Bar" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#progress-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    		: '',
				'title'    		: '',
				'icon'    		: '',
				'value' 		: '0'
				};
			var shortcode = '[progress_bar';
			
			for( var index in options) {
				var value = table.find('#progress-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.portfolios', {
      init : function(ed, url) {
         ed.addButton('portfolios', {
            title : 'Portfolio Showcase Shortcode',
            image : url+'/button-icons/shortcode-portfolio-showcase.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Portfolio Showcase Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=portfolios-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "portfolios",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('portfolios', tinymce.plugins.portfolios);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="portfolios-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="portfolios-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="portfolios-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a portfolio category name or leave blank to display all portfolio items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-columnwidth"><strong>columnwidth</strong></label></th>\
				<td><select name="columnwidth" id="portfolios-columnwidth">\
					<option value="3">3</option>\
					<option value="4" selected>4</option>\
					<option value="6">6</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="portfolios-number" value="6" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of portfolio items to display.</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-order"><strong>order</strong></label></th>\
				<td><select name="order" id="portfolios-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="portfolios-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-archive"><strong>archive</strong></label></th>\
				<td><select name="archive" id="portfolios-archive">\
					<option value="">hide</option>\
					<option value="show">show</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-archivetext"><strong>archivetext</strong></label></th>\
				<td><input type="text" name="archivetext" id="portfolios-archivetext" value="View all projects" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter archive button text</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-archiveicon"><strong>archiveicon</strong></label></th>\
				<td><input type="text" name="archiveicon" id="portfolios-archiveicon" value="fa-folder-open-o" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-folder-open-o.</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-archivewidth"><strong>archivewidth</strong></label></th>\
				<td><input type="text" name="archivewidth" id="portfolios-archivewidth" value="200" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter archive button width in pixels</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfolios-filter"><strong>filter</strong></label></th>\
				<td><select name="filter" id="portfolios-filter">\
					<option value="">hide</option>\
					<option value="show">show</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="portfolios-submit" class="button-primary" value="Insert Portfolio Showcase" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#portfolios-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'category'    		: '',
				'columnwidth' 		: '4',
				'number'  			: '6',
				'order'  			: 'DESC',
				'orderby'  			: 'date',
				'archive'  			: '',
				'archivetext'  		: 'View all projects',
				'archiveicon'  		: 'fa-folder-open-o',
				'archivewidth'  	: '200',
				'filter'  			: ''
				};
			var shortcode = '[portfolio_showcase';
			
			for( var index in options) {
				var value = table.find('#portfolios-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.portfoliod', {
      init : function(ed, url) {
         ed.addButton('portfoliod', {
            title : 'Portfolio Details Shortcode',
            image : url+'/button-icons/shortcode-portfolio-details.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Portfolio Details Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=portfoliod-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "portfoliod",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('portfoliod', tinymce.plugins.portfoliod);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="portfoliod-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="portfoliod-displaylink"><strong>displaylink</strong></label></th>\
				<td><select name="displaylink" id="portfoliod-displaylink">\
					<option value="">show</option>\
					<option value="none">none</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="portfoliod-link"><strong>link</strong></label></th>\
				<td><input type="text" name="link" id="portfoliod-link" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full URL of webpage.</div></td>\
			</tr>\
			<tr>\
				<th><label for="portfoliod-linktext"><strong>linktext</strong></label></th>\
				<td><input type="text" name="linktext" id="portfoliod-linktext" value="Visit Website" /><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="portfoliod-submit" class="button-primary" value="Insert Portfolio Details" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#portfoliod-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'displaylink'    		: '',
				'link' 				: '',
				'linktext'  		: 'Visit Website'
				};
			var shortcode = '[portfolio_details';
			
			for( var index in options) {
				var value = table.find('#portfoliod-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.sectionportfolio', {
      init : function(ed, url) {
         ed.addButton('sectionportfolio', {
            title : 'Section Portfolio Shortcode',
            image : url+'/button-icons/shortcode-sectionp.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Section Portfolio Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sectionportfolio-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "sectionportfolio",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('sectionportfolio', tinymce.plugins.sectionportfolio);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="sectionportfolio-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="sectionportfolio-type"><strong>type</strong></label></th>\
				<td><select name="type" id="sectionportfolio-type">\
					<option value="standard">standard</option>\
					<option value="split">split</option>\
					<option value="video">video</option>\
					<option value="slide">slide</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-id"><strong>id</strong></label></th>\
				<td><input type="text" name="id" id="sectionportfolio-id" value="section" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Give section a unique ID for anchor reference.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-icon"><strong>icon</strong></label></th>\
				<td><input type="text" name="icon" id="sectionportfolio-icon" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Insert a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> or Linecons icon code. E.g. fa-check.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-header"><strong>header</strong></label></th>\
				<td><input type="text" name="header" id="sectionportfolio-header" value="" /><br />\
				<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a header for this portfolio section.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-details"><strong>details</strong></label></th>\
				<td><input type="text" name="details" id="sectionportfolio-details" value="" /><br />\
				<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter details about this portfolio section.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-imageurl"><strong>imageurl</strong></label></th>\
				<td><input type="text" name="imageurl" id="sectionportfolio-imageurl" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL (inc http//:)</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-imageurl2"><strong>imageurl2</strong></label></th>\
				<td><input type="text" name="imageurl2" id="sectionportfolio-imageurl2" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL (inc http//:). For split types only.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-imageurl3"><strong>imageurl3</strong></label></th>\
				<td><input type="text" name="imageurl3" id="sectionportfolio-imageurl3" value="" /><br />\
					<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL (inc http//:). For split types only.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-embed"><strong>embed</strong></label></th>\
				<td><input type="text" name="embed" id="sectionportfolio-embed" value="" /><br />\
				<div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter Youtube or Vimeo embed code.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="sectionportfolio-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a  category name for the slide section type or leave blank to display all gallery items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="sectionportfolio-number" value="6" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of slider images to show for the slide section type.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-order"><strong>order</strong></label></th>\
				<td><select name="order" id="sectionportfolio-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Select order of images within the slider for the slide section type.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="sectionportfolio-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Select method to order images within the slider for the slide section type.</div></td>\
			</tr>\
			<tr>\
				<th><label for="sectionportfolio-sidecolor"><strong>sidecolor</strong></label></th>\
				<td><input type="text" name="sidecolor" id="sectionportfolio-sidecolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Hex color of background. E.g. #000000.</div></td>\
			</tr>\
		</table>\
		<p class="submit sectionportfolio-shortcode" id="manu">\
			<input type="button" id="sectionportfolio-submit" class="button-primary" value="Insert Section Portfolio" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#sectionportfolio-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    		: 'standard',
				'id'    		: 'section',
				'icon'    		: '',
				'header' 		: '',
				'imageurl'    	: '',
				'imageurl2'    	: '',
				'imageurl3'    	: '',
				'embed' 		: '',
				'details' 		: '',
				'category' 		: '',
				'number'  		: '6',
				'order'    		: 'DESC',
				'orderby'    		: 'date',
				'sidecolor'    		: ''
				};
			var shortcode = '[section_port';
			var type = table.find('#sectionportfolio-type').val();
			
			for( var index in options) {
				var value = table.find('#sectionportfolio-' + index).val();
				// attaches the attribute to the shortcode only if it's different from the default value
				
				if ( value !== options[index] ) {
					shortcode += ' ' + index + '="' + value + '"';
				}
			    
			}
			shortcode += '] Content [/section_port]';
				
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.carousel', {
      init : function(ed, url) {
         ed.addButton('carousel', {
            title : 'Carousel Shortcode',
            image : url+'/button-icons/shortcode-portfolios.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Carousel Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=carousel-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "carousel",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('carousel', tinymce.plugins.carousel);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="carousel-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="carousel-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="carousel-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a carsousel category name or leave blank to display all carsousel items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="carousel-order"><strong>order</strong></label></th>\
				<td><select name="order" id="carousel-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="carousel-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="carousel-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="carousel-submit" class="button-primary" value="Insert Carousel" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#carousel-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'category'    		: '',
				'order'  			: 'DESC',
				'orderby'  			: 'date'
				};
			var shortcode = '[carousel';
			
			for( var index in options) {
				var value = table.find('#carousel-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.googlemaps', {
      init : function(ed, url) {
         ed.addButton('googlemaps', {
            title : 'Googlemaps Shortcode',
            image : url+'/button-icons/shortcode-googlemaps.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Google Maps Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=googlemaps-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "googlemaps",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('googlemaps', tinymce.plugins.googlemaps);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="googlemaps-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="googlemaps-id"><strong>id</strong></label></th>\
				<td><input type="text" name="id" id="googlemaps-id" value="myMap" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Unique ID for this map.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-latitude"><strong>latitude</strong></label></th>\
				<td><input type="text" name="latitude" id="googlemaps-latitude" value="51.501364" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;"><a href="http://itouchmap.com/latlong.html" target="_blank">Enter your address here</a> to get the latitude value.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-longitude"><strong>longitude</strong></label></th>\
				<td><input type="text" name="longitude" id="googlemaps-longitude" value="-0.141890" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;"><a href="http://itouchmap.com/latlong.html" target="_blank">Enter your address here</a> to get the longitude value.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-marker"><strong>marker</strong> (optional)</label></th>\
				<td><input type="text" name="marker" id="googlemaps-marker" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Full image URL.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-message"><strong>message</strong></label></th>\
				<td><input type="text" name="message" id="googlemaps-message" value="We are here!" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Message that appears when map marker is clicked.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-zoom"><strong>zoom</strong></label></th>\
				<td><input type="text" name="zoom" id="googlemaps-zoom" value="14" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-height"><strong>height</strong></label></th>\
				<td><input type="text" name="height" id="googlemaps-height" value="250" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Height of the maps container in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="googlemaps-color"><strong>color</strong> (optional)</label></th>\
				<td><input type="text" name="color" id="googlemaps-color" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Custom hex color of maps. E.g. #000000.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="googlemaps-submit" class="button-primary" value="Insert googlemaps" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#googlemaps-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'id'    		: 'myMap',
				'latitude' 		: '51.501364',
				'longitude'  	: '-0.141890',
				'marker'    	: '',
				'message' 		: 'We are here!',
				'zoom'  		: '14',
				'height'    	: '250',
				'color' 		: ''
				};
			var shortcode = '[po_googlemaps';
			
			for( var index in options) {
				var value = table.find('#googlemaps-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.clients', {
      init : function(ed, url) {
         ed.addButton('clients', {
            title : 'Clients Shortcode',
            image : url+'/button-icons/shortcode-client.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Clients Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=clients-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "clients",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('clients', tinymce.plugins.clients);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="clients-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="clients-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="clients-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a client category name or leave blank to display all client items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="clients-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="clients-number" value="10" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of client images to show.</div></td>\
			</tr>\
			<tr>\
				<th><label for="clients-columnwidth"><strong>columnwidth</strong></label></th>\
				<td><input type="text" name="columnwidth" id="clients-columnwidth" value="3" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="clients-order"><strong>order</strong></label></th>\
				<td><select name="order" id="clients-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="clients-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="clients-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="clients-submit" class="button-primary" value="Insert clients" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#clients-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'category'    		: '',
				'number'    		: '10',
				'columnwidth'    	: '3',
				'order'  			: 'DESC',
				'orderby'  			: 'date'
				};
			var shortcode = '[clients';
			
			for( var index in options) {
				var value = table.find('#clients-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.team', {
      init : function(ed, url) {
         ed.addButton('team', {
            title : 'Team Shortcode',
            image : url+'/button-icons/shortcode-team.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Team Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=team-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "team",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('team', tinymce.plugins.team);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="team-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="team-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="team-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a team category name or leave blank to display all team items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="team-columnwidth"><strong>columnwidth</strong></label></th>\
				<td><input type="text" name="columnwidth" id="team-columnwidth" value="2" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter the column width of each team item.</div></td>\
			</tr>\
			<tr>\
				<th><label for="team-order"><strong>order</strong></label></th>\
				<td><select name="order" id="team-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="team-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="team-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="team-submit" class="button-primary" value="Insert team" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#team-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'category'    		: '',
				'columnwidth'    		: '2',
				'order'  			: 'DESC',
				'orderby'  			: 'date'
				};
			var shortcode = '[team';
			
			for( var index in options) {
				var value = table.find('#team-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.testimonials', {
      init : function(ed, url) {
         ed.addButton('testimonials', {
            title : 'Testimonials Shortcode',
            image : url+'/button-icons/shortcode-testimonials.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Testimonials Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=testimonials-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "testimonials",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('testimonials', tinymce.plugins.testimonials);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="testimonials-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="testimonials-width"><strong>width</strong></label></th>\
				<td><select name="width" id="testimonials-width">\
					<option value="">standard</option>\
					<option value="sidebar">sidebar</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="testimonials-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a testimonials category name or leave blank to display all testimonials.</div></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-backgroundcolor"><strong>backgroundcolor</strong></label></th>\
				<td><input type="text" name="backgroundcolor" id="testimonials-backgroundcolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Hex color of background. E.g. #000000.</div></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-textcolor"><strong>textcolor</strong></label></th>\
				<td><input type="text" name="textcolor" id="testimonials-textcolor" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Hex color of text. E.g. #FFFFFF.</div></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="testimonials-paddingtop" value="50" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space above testimonials.</div></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="testimonials-paddingbottom" value="50" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Space below testimonials.</div></td>\
			</tr>\
			<tr>\
				<th><label for="testimonials-header"><strong>header</strong> (optional)</label></th>\
				<td><input type="text" name="header" id="testimonials-header" value="" /><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="testimonials-submit" class="button-primary" value="Insert testimonials" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#testimonials-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'width'  			: '',
				'category'  		: '',
				'backgroundcolor'   : '',
				'textcolor' 		: '',
				'paddingtop'  	    : '50',
				'paddingbottom' 	: '50',
				'header'  			: ''
				};
			var shortcode = '[testimonials';
			
			for( var index in options) {
				var value = table.find('#testimonials-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.social', {
      init : function(ed, url) {
         ed.addButton('social', {
            title : 'Social Shortcode',
            image : url+'/button-icons/shortcode-social.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Social Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=social-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "social",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('social', tinymce.plugins.social);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="social-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="social-type"><strong>type</strong></label></th>\
				<td><input type="text" name="type" id="social-type" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Leave blank to enter all social profiles. For a custom list, enter the social profiles you want to show (separated by a comma) from the following list: <br /><br /><strong>email, twitter, facebook, googleplus, pinterest, youtube, vimeo, linkedin, github, foursquare, instagram, flickr</strong></div></td>\
			</tr>\
			<tr>\
				<th><label for="social-align"><strong>align</strong></label></th>\
				<td><select name="align" id="social-align">\
					<option value="">left</option>\
					<option value="center">center</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="social-submit" class="button-primary" value="Insert social" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#social-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    		: '',
				'align'    		: ''
				};
			var shortcode = '[social';
			
			for( var index in options) {
				var value = table.find('#social-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.social_person', {
      init : function(ed, url) {
         ed.addButton('social_person', {
            title : 'Social Person Shortcode',
            image : url+'/button-icons/shortcode-social-person.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Social Person Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=social_person-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "social_person",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('social_person', tinymce.plugins.social_person);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="social_person-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="social_person-type"><strong>type</strong></label></th>\
				<td><input type="text" name="type" id="social_person-type" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Leave blank to enter all social profiles. For a custom list, enter the social profiles you want to show (separated by a comma) from the following list: <br /><br /><strong>email, twitter, facebook, googleplus, pinterest, youtube, vimeo, linkedin, github, foursquare, instagram, flickr</strong></div></td>\
			</tr>\
			<tr>\
				<th><label for="social-align"><strong>align</strong></label></th>\
				<td><select name="align" id="social-align">\
					<option value="">left</option>\
					<option value="center">center</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-emailaddress"><strong>emailaddress</strong></label></th>\
				<td><input type="text" name="emailaddress" id="social_person-emailaddress" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-twitterusername"><strong>twitterusername</strong></label></th>\
				<td><input type="text" name="twitterusername" id="social_person-twitterusername" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-facebookurl"><strong>facebookurl</strong></label></th>\
				<td><input type="text" name="facebookurl" id="social_person-facebookurl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-googleplusurl"><strong>googleplusurl</strong></label></th>\
				<td><input type="text" name="googleplusurl" id="social_person-googleplusurl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-pinterestusername"><strong>pinterestusername</strong></label></th>\
				<td><input type="text" name="pinterestusername" id="social_person-pinterestusername" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-youtubeurl"><strong>youtubeurl</strong></label></th>\
				<td><input type="text" name="youtubeurl" id="social_person-youtubeurl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-vimeousername"><strong>vimeousername</strong></label></th>\
				<td><input type="text" name="vimeousername" id="social_person-vimeousername" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-linkedinurl"><strong>linkedinurl</strong></label></th>\
				<td><input type="text" name="linkedinurl" id="social_person-linkedinurl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-githuburl"><strong>githuburl</strong></label></th>\
				<td><input type="text" name="githuburl" id="social_person-githuburl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-foursquareurl"><strong>foursquareurl</strong></label></th>\
				<td><input type="text" name="foursquareurl" id="social_person-foursquareurl" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-instagramusername"><strong>instagramusername</strong></label></th>\
				<td><input type="text" name="instagramusername" id="social_person-instagramusername" value="" /><br /></td>\
			</tr>\
			<tr>\
				<th><label for="social_person-flickrurl"><strong>flickrurl</strong></label></th>\
				<td><input type="text" name="flickrurl" id="social_person-flickrurl" value="" /><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="social_person-submit" class="button-primary" value="Insert Social Person" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#social_person-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    			: '',
				'align'    		    : '',
				'emailaddress'    	: '',
				'twitterusername'   : '',
				'facebookurl'    	: '',
				'googleplusurl'    	: '',
				'pinterestusername' : '',
				'youtubeurl'    	: '',
				'vimeousername'    	: '',
				'linkedinurl'    	: '',
				'githuburl'    		: '',
				'foursquareurl'    	: '',
				'instagramusername' : '',
				'flickrurl'    		: ''
				};
			var shortcode = '[social_person';
			
			for( var index in options) {
				var value = table.find('#social_person-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.tweets', {
      init : function(ed, url) {
         ed.addButton('tweets', {
            title : 'Tweets Shortcode',
            image : url+'/button-icons/shortcode-tweets.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Tweets Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=tweets-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "tweets",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('tweets', tinymce.plugins.tweets);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="tweets-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="tweets-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="tweets-number" value="2" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of recent tweets.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="tweets-submit" class="button-primary" value="Insert Tweets" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#tweets-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'number'  : '2'
				};
			var shortcode = '[tweets';
			
			for( var index in options) {
				var value = table.find('#tweets-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.recent_posts', {
      init : function(ed, url) {
         ed.addButton('recent_posts', {
            title : 'Recent Posts Footer Shortcode',
            image : url+'/button-icons/shortcode-posts-footer.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Recent Posts Footer Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=recent_posts-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "recent_posts",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('recent_posts', tinymce.plugins.recent_posts);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="recent_posts-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="recent_posts-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="recent_posts-number" value="4" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of recent posts.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="recent_posts-submit" class="button-primary" value="Insert Recent Posts Footer" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#recent_posts-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'number'  : '4'
				};
			var shortcode = '[recentposts_footer';
			
			for( var index in options) {
				var value = table.find('#recent_posts-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.footer_portfolio', {
      init : function(ed, url) {
         ed.addButton('footer_portfolio', {
            title : 'Portfolio Footer Shortcode',
            image : url+'/button-icons/shortcode-footer-portfolio.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Portfolio Footer Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=footer_portfolio-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "footer_portfolio",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('footer_portfolio', tinymce.plugins.footer_portfolio);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="footer_portfolio-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="footer_portfolio-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="footer_portfolio-number" value="6" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of portfolio items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="footer_portfolio-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="footer_portfolio-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a portfolio category name or leave blank to display all portfolio items.</div></td>\
			</tr>\
			<tr>\
				<th><label for="footer_portfolio-order"><strong>order</strong></label></th>\
				<td><select name="order" id="footer_portfolio-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="footer_portfolio-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="footer_portfolio-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="footer_portfolio-submit" class="button-primary" value="Insert Footer Portfolio" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#footer_portfolio-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'number'  : '6',
				'category'  : '',
				'order'  : 'DESC',
				'orderby'  : 'date'
				};
			var shortcode = '[portfolio_footer';
			
			for( var index in options) {
				var value = table.find('#footer_portfolio-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.goto', {
      init : function(ed, url) {
         ed.addButton('goto', {
            title : 'Go-to Shortcode',
            image : url+'/button-icons/shortcode-goto.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Go-to Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=goto-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "goto",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('goto', tinymce.plugins.goto);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="goto-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="goto-id"><strong>id</strong></label></th>\
				<td><input type="text" name="id" id="goto-id" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">ID of Section shortcode to scroll towards.</div></td>\
			</tr>\
			<tr>\
				<th><label for="goto-color"><strong>color</strong></label></th>\
				<td><input type="text" name="color" id="goto-color" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a hex color. E.g. #000000</div></td>\
			</tr>\
			<tr>\
				<th><label for="goto-paddingtop"><strong>paddingtop</strong></label></th>\
				<td><input type="text" name="paddingtop" id="goto-paddingtop" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Manually change space above the go-to icon in pixels.</div></td>\
			</tr>\
			<tr>\
				<th><label for="goto-paddingbottom"><strong>paddingbottom</strong></label></th>\
				<td><input type="text" name="paddingbottom" id="goto-paddingbottom" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Manually change space below the go-to icon in pixels.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="goto-submit" class="button-primary" value="Insert Go-To" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#goto-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'id'  : '',
				'color'  : '',
				'paddingtop'  : '',
				'paddingbottom'  : ''
				};
			var shortcode = '[goto';
			
			for( var index in options) {
				var value = table.find('#goto-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.odometer', {
      init : function(ed, url) {
         ed.addButton('odometer', {
            title : 'Odometer Shortcode',
            image : url+'/button-icons/shortcode-odometer.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Odometer Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=odometer-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "odometer",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('odometer', tinymce.plugins.odometer);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="odometer-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="odometer-value"><strong>value</strong></label></th>\
				<td><input type="text" name="value" id="odometer-value" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a numeric value.</div></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="odometer-submit" class="button-primary" value="Insert Odometer" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#odometer-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'value'  : ''
				};
			var shortcode = '[odometer';
			
			for( var index in options) {
				var value = table.find('#odometer-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();

(function() {
   tinymce.create('tinymce.plugins.recentposts', {
      init : function(ed, url) {
         ed.addButton('recentposts', {
            title : 'Recent Posts Shortcode',
            image : url+'/button-icons/shortcode-posts.png',
            onclick : function() {
               // triggers the thickbox
				var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
				W = W - 80;
				H = H - 84;
				tb_show( 'Recent Posts Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=recentposts-form' );
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "recentposts",
            author : 'Pixel Object',
            authorurl : 'http://www.pixelobject.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('recentposts', tinymce.plugins.recentposts);
   jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="recentposts-form"><table id="mygallery-table" class="form-table">\
			<tr>\
				<th><label for="recentposts-category"><strong>category</strong></label></th>\
				<td><input type="text" name="category" id="recentposts-category" value="" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Enter a category name or leave blank to display all posts.</div></td>\
			</tr>\
			<tr>\
				<th><label for="recentposts-columnwidth"><strong>columnwidth</strong></label></th>\
				<td><select name="columnwidth" id="recentposts-columnwidth">\
					<option value="3">3</option>\
					<option value="4" selected>4</option>\
					<option value="6">6</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="recentposts-number"><strong>number</strong></label></th>\
				<td><input type="text" name="number" id="recentposts-number" value="3" /><br /><div style="font-size:12px; margin-top:5px; font-style:italic; color:#777;">Number of portfolio items to display.</div></td>\
			</tr>\
			<tr>\
				<th><label for="recentposts-order"><strong>order</strong></label></th>\
				<td><select name="order" id="recentposts-order">\
					<option value="DESC">DESC</option>\
					<option value="ASC">ASC</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="recentposts-orderby"><strong>orderby</strong></label></th>\
				<td><select name="orderby" id="recentposts-orderby">\
					<option value="date">date</option>\
					<option value="title">title</option>\
					<option value="modified">modified</option>\
					<option value="rand">rand</option>\
				</select><br /></td>\
			</tr>\
			<tr>\
				<th><label for="recentposts-archive"><strong>archive</strong></label></th>\
				<td><select name="archive" id="recentposts-archive">\
					<option value="">hide</option>\
					<option value="show">show</option>\
				</select><br /></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="recentposts-submit" class="button-primary" value="Insert recentposts" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#recentposts-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'category'    		: '',
				'columnwidth' 		: '4',
				'number'  			: '3',
				'order'  			: 'DESC',
				'orderby'  			: 'date',
				'archive'  			: ''
				
				};
			var shortcode = '[recentposts';
			
			for( var index in options) {
				var value = table.find('#recentposts-' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})();