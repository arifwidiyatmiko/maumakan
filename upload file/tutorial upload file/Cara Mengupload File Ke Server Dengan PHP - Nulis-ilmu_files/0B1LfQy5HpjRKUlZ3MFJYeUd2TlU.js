/**
 * Code Syntax Highlighter.
 * Version 1.5.2
 * Copyright (C) 2004-2008 Alex Gorbatchev
 * http://www.dreamprojections.com/syntaxhighlighter/
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, version 3 of the License.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *  Packed with XML, PHP, JS, CSS Brush for nulis-ilmu.blogspot.com used
 */

//
// create namespaces
//
var dp = {
	sh :
	{
		Toolbar : {},
		Utils	: {},
		RegexLib: {},
		Brushes	: {},
		Strings : {
			AboutDialog : '<html><head><title>About...</title></head><body class="dp-about"><table cellspacing="0"><tr><td class="copy"><p class="title">dp.SyntaxHighlighter</div><div class="para">Version: {V}</p><p><a href="http://www.dreamprojections.com/syntaxhighlighter/?ref=about" target="_blank">http://www.dreamprojections.com/syntaxhighlighter</a></p>&copy;2004-2008 Alex Gorbatchev.</td></tr><tr><td class="footer"><input type="button" class="close" value="OK" onClick="window.close()"/></td></tr></table></body></html>'
		},
		ClipboardSwf : null,
		Version : '1.5.2'
	}
};

// make an alias
dp.SyntaxHighlighter = dp.sh;

//
// Toolbar functions
//

dp.sh.Toolbar.Commands = {
	ExpandSource: {
		label: '+ expand source',
		check: function(highlighter) { return highlighter.collapse; },
		func: function(sender, highlighter)
		{
			sender.parentNode.removeChild(sender);
			highlighter.div.className = highlighter.div.className.replace('collapsed', '');
		}
	},
	
	// opens a new windows and puts the original unformatted source code inside.
	ViewSource: {
		label: 'view plain',
		func: function(sender, highlighter)
		{
			var code = dp.sh.Utils.FixForBlogger(highlighter.originalCode).replace(/</g, '&lt;');
			var wnd = window.open('', '_blank', 'width=750, height=400, location=0, resizable=1, menubar=0, scrollbars=0');
			wnd.document.write('<textarea style="width:99%;height:99%">' + code + '</textarea>');
			wnd.document.close();
		}
	},
	
	// Copies the original source code in to the clipboard. Uses either IE only method or Flash object if ClipboardSwf is set
	CopyToClipboard: {
		label: 'copy to clipboard',
		check: function() { return window.clipboardData != null || dp.sh.ClipboardSwf != null; },
		func: function(sender, highlighter)
		{
			var code = dp.sh.Utils.FixForBlogger(highlighter.originalCode)
				.replace(/&lt;/g,'<')
				.replace(/&gt;/g,'>')
				.replace(/&amp;/g,'&')
			;
			
			if(window.clipboardData)
			{
				window.clipboardData.setData('text', code);
			}
			else if(dp.sh.ClipboardSwf != null)
			{
				var flashcopier = highlighter.flashCopier;
				
				if(flashcopier === null)
				{
					flashcopier = document.createElement('div');
					highlighter.flashCopier = flashcopier;
					highlighter.div.appendChild(flashcopier);
				}
				
				flashcopier.innerHTML = '<embed src="' + dp.sh.ClipboardSwf + '" FlashVars="clipboard='+encodeURIComponent(code)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
			}
			
			alert('The code is in your clipboard now');
		}
	},
	
	// creates an invisible iframe, puts the original source code inside and prints it
	PrintSource: {
		label: 'print',
		func: function(sender, highlighter)
		{
			var iframe = document.createElement('IFRAME');
			var doc = null;

			// this hides the iframe
			iframe.style.cssText = 'position:absolute;width:0px;height:0px;left:-500px;top:-500px;';
			
			document.body.appendChild(iframe);
			doc = iframe.contentWindow.document;

			dp.sh.Utils.CopyStyles(doc, window.document);
			doc.write('<div class="' + highlighter.div.className.replace('collapsed', '') + ' printing">' + highlighter.div.innerHTML + '</div>');
			doc.close();

			iframe.contentWindow.focus();
			iframe.contentWindow.print();
			
			alert('Printing...');
			
			document.body.removeChild(iframe);
		}
	},
	
	About: {
		label: '?',
		func: function(highlighter)
		{
			var wnd	= window.open('', '_blank', 'dialog,width=300,height=150,scrollbars=0');
			var doc	= wnd.document;

			dp.sh.Utils.CopyStyles(doc, window.document);
			
			doc.write(dp.sh.Strings.AboutDialog.replace('{V}', dp.sh.Version));
			doc.close();
			wnd.focus();
		}
	}
};

// creates a <div /> with all toolbar links
dp.sh.Toolbar.Create = function(highlighter)
{
	var div = document.createElement('DIV');
	
	div.className = 'tools';
	
	for(var name in dp.sh.Toolbar.Commands)
	{
		var cmd = dp.sh.Toolbar.Commands[name];
		
		if(cmd.check != null && !cmd.check(highlighter))
			continue;
		
		div.innerHTML += '<a href="#" onclick="dp.sh.Toolbar.Command(\'' + name + '\',this);return false;">' + cmd.label + '</a>';
	}
	
	return div;
}

// executes toolbar command by name
dp.sh.Toolbar.Command = function(name, sender)
{
	var n = sender;
	
	while(n != null && n.className.indexOf('dp-highlighter') == -1)
		n = n.parentNode;
	
	if(n != null)
		dp.sh.Toolbar.Commands[name].func(sender, n.highlighter);
}

// copies all <link rel="stylesheet" /> from 'target' window to 'dest'
dp.sh.Utils.CopyStyles = function(destDoc, sourceDoc)
{
	var links = sourceDoc.getElementsByTagName('link');

	for(var i = 0; i < links.length; i++)
		if(links[i].rel.toLowerCase() == 'stylesheet')
			destDoc.write('<link type="text/css" rel="stylesheet" href="' + links[i].href + '"></link>');
}

dp.sh.Utils.FixForBlogger = function(str)
{
	return (dp.sh.isBloggerMode == true) ? str.replace(/<br\s*\/?>|&lt;br\s*\/?&gt;/gi, '\n') : str;
}

//
// Common reusable regular expressions
//
dp.sh.RegexLib = {
	MultiLineCComments : new RegExp('/\\*[\\s\\S]*?\\*/', 'gm'),
	SingleLineCComments : new RegExp('//.*$', 'gm'),
	SingleLinePerlComments : new RegExp('#.*$', 'gm'),
	DoubleQuotedString : new RegExp('"(?:\\.|(\\\\\\")|[^\\""\\n])*"','g'),
	SingleQuotedString : new RegExp("'(?:\\.|(\\\\\\')|[^\\''\\n])*'", 'g')
};

//
// Match object
//
dp.sh.Match = function(value, index, css)
{
	this.value = value;
	this.index = index;
	this.length = value.length;
	this.css = css;
}

//
// Highlighter object
//
dp.sh.Highlighter = function()
{
	this.noGutter = false;
	this.addControls = true;
	this.collapse = false;
	this.tabsToSpaces = true;
	this.wrapColumn = 80;
	this.showColumns = true;
}

// static callback for the match sorting
dp.sh.Highlighter.SortCallback = function(m1, m2)
{
	// sort matches by index first
	if(m1.index < m2.index)
		return -1;
	else if(m1.index > m2.index)
		return 1;
	else
	{
		// if index is the same, sort by length
		if(m1.length < m2.length)
			return -1;
		else if(m1.length > m2.length)
			return 1;
	}
	return 0;
}

dp.sh.Highlighter.prototype.CreateElement = function(name)
{
	var result = document.createElement(name);
	result.highlighter = this;
	return result;
}

// gets a list of all matches for a given regular expression
dp.sh.Highlighter.prototype.GetMatches = function(regex, css)
{
	var index = 0;
	var match = null;

	while((match = regex.exec(this.code)) != null)
		this.matches[this.matches.length] = new dp.sh.Match(match[0], match.index, css);
}

dp.sh.Highlighter.prototype.AddBit = function(str, css)
{
	if(str === null || str.length === 0)
		return;

	var span = this.CreateElement('SPAN');
	
//	str = str.replace(/&/g, '&amp;');
	str = str.replace(/ /g, '&nbsp;');
	str = str.replace(/</g, '&lt;');
//	str = str.replace(/&lt;/g, '<');
//	str = str.replace(/>/g, '&gt;');
	str = str.replace(/\n/gm, '&nbsp;<br>');

	// when adding a piece of code, check to see if it has line breaks in it 
	// and if it does, wrap individual line breaks with span tags
	if(css != null)
	{
		if((/br/gi).test(str))
		{
			var lines = str.split('&nbsp;<br>');
			
			for(var i = 0; i < lines.length; i++)
			{
				span = this.CreateElement('SPAN');
				span.className = css;
				span.innerHTML = lines[i];
				
				this.div.appendChild(span);
				
				// don't add a <BR> for the last line
				if(i + 1 < lines.length)
					this.div.appendChild(this.CreateElement('BR'));
			}
		}
		else
		{
			span.className = css;
			span.innerHTML = str;
			this.div.appendChild(span);
		}
	}
	else
	{
		span.innerHTML = str;
		this.div.appendChild(span);
	}
}

// checks if one match is inside any other match
dp.sh.Highlighter.prototype.IsInside = function(match)
{
	if(match === null || match.length === 0)
		return false;
	
	for(var i = 0; i < this.matches.length; i++)
	{
		var c = this.matches[i];
		
		if(c === null)
			continue;

		if((match.index > c.index) && (match.index < c.index + c.length))
			return true;
	}
	
	return false;
}

dp.sh.Highlighter.prototype.ProcessRegexList = function()
{
	for(var i = 0; i < this.regexList.length; i++)
		this.GetMatches(this.regexList[i].regex, this.regexList[i].css);
}

dp.sh.Highlighter.prototype.ProcessSmartTabs = function(code)
{
	var lines	= code.split('\n');
	var result	= '';
	var tabSize	= 4;
	var tab		= '\t';

	// This function inserts specified amount of spaces in the string
	// where a tab is while removing that given tab. 
	function InsertSpaces(line, pos, count)
	{
		var left	= line.substr(0, pos);
		var right	= line.substr(pos + 1, line.length);	// pos + 1 will get rid of the tab
		var spaces	= '';
		
		for(var i = 0; i < count; i++)
			spaces += ' ';
		
		return left + spaces + right;
	}

	// This function process one line for 'smart tabs'
	function ProcessLine(line, tabSize)
	{
		if(line.indexOf(tab) == -1)
			return line;

		var pos = 0;

		while((pos = line.indexOf(tab)) != -1)
		{
			// This is pretty much all there is to the 'smart tabs' logic.
			// Based on the position within the line and size of a tab, 
			// calculate the amount of spaces we need to insert.
			var spaces = tabSize - pos % tabSize;
			
			line = InsertSpaces(line, pos, spaces);
		}
		
		return line;
	}

	// Go through all the lines and do the 'smart tabs' magic.
	for(var i = 0; i < lines.length; i++)
		result += ProcessLine(lines[i], tabSize) + '\n';
	
	return result;
}

dp.sh.Highlighter.prototype.SwitchToList = function()
{
	// thanks to Lachlan Donald from SitePoint.com for this <br/> tag fix.
	var html = this.div.innerHTML.replace(/<(br)\/?>/gi, '\n');
	var lines = html.split('\n');
	
	if(this.addControls == true)
		this.bar.appendChild(dp.sh.Toolbar.Create(this));

	// add columns ruler
	if(this.showColumns)
	{
		var div = this.CreateElement('div');
		var columns = this.CreateElement('div');
		var showEvery = 10;
		var i = 1;
		
		while(i <= 150)
		{
			if(i % showEvery === 0)
			{
				div.innerHTML += i;
				i += (i + '').length;
			}
			else
			{
				div.innerHTML += '&middot;';
				i++;
			}
		}
		
		columns.className = 'cumns';
		columns.appendChild(div);
		this.bar.appendChild(columns);
	}

	for(var i = 0; i < lines.length - 1; i++)
	{
		var li = this.CreateElement('LI');
		var span = this.CreateElement('SPAN');
		
		// uses .line1 and .line2 css styles for alternating lines
		li.className = (i % 2 === 0) ? 'alt' : '';
		span.innerHTML = lines[i] + '&nbsp;';

		li.appendChild(span);
		this.ol.appendChild(li);
	}
	
	this.div.innerHTML	= '';
}

dp.sh.Highlighter.prototype.Highlight = function(code)
{
	function Trim(str)
	{
		return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
	}
	
	function Chop(str)
	{
		return str.replace(/\n*$/, '').replace(/^\n*/, '');
	}

	function Unindent(str)
	{
		var lines = dp.sh.Utils.FixForBlogger(str).split('\n');
		var indents = new Array();
		var regex = new RegExp('^\\s*', 'g');
		var min = 1000;

		// go through every line and check for common number of indents
		for(var i = 0; i < lines.length && min > 0; i++)
		{
			if(Trim(lines[i]).length === 0)
				continue;
				
			var matches = regex.exec(lines[i]);

			if(matches != null && matches.length > 0)
				min = Math.min(matches[0].length, min);
		}

		// trim minimum common number of white space from the begining of every line
		if(min > 0)
			for(var i = 0; i < lines.length; i++)
				lines[i] = lines[i].substr(min);

		return lines.join('\n');
	}
	
	// This function returns a portions of the string from pos1 to pos2 inclusive
	function Copy(string, pos1, pos2)
	{
		return string.substr(pos1, pos2 - pos1);
	}

	var pos	= 0;
	
	if(code === null)
		code = '';
	
	this.originalCode = code;
	this.code = Chop(Unindent(code));
	this.div = this.CreateElement('DIV');
	this.bar = this.CreateElement('DIV');
	this.ol = this.CreateElement('OL');
	this.matches = new Array();

	this.div.className = 'dp-highlighter';
	this.div.highlighter = this;
	
	this.bar.className = 'bar';
	
	// set the first line
	if (this.firstLine != null)
		this.ol.start = this.firstLine;

	if(this.CssClass != null)
		this.ol.className = this.CssClass;

	if(this.collapse)
		this.div.className += ' collapsed';
	
	if(this.noGutter)
		this.div.className += ' nogutter';

	// replace tabs with spaces
	if(this.tabsToSpaces == true)
		this.code = this.ProcessSmartTabs(this.code);

	this.ProcessRegexList();	

	// if no matches found, add entire code as plain text
	if(this.matches.length === 0)
	{
		this.AddBit(this.code, null);
		this.SwitchToList();
		this.div.appendChild(this.bar);
		this.div.appendChild(this.ol);
		return;
	}

	// sort the matches
	this.matches = this.matches.sort(dp.sh.Highlighter.SortCallback);

	// The following loop checks to see if any of the matches are inside
	// of other matches. This process would get rid of highligted strings
	// inside comments, keywords inside strings and so on.
	for(var i = 0; i < this.matches.length; i++)
		if(this.IsInside(this.matches[i]))
			this.matches[i] = null;

	// Finally, go through the final list of matches and pull the all
	// together adding everything in between that isn't a match.
	for(var i = 0; i < this.matches.length; i++)
	{
		var match = this.matches[i];

		if(match === null || match.length === 0)
			continue;

		this.AddBit(Copy(this.code, pos, match.index), null);
		this.AddBit(match.value, match.css);

		pos = match.index + match.length;
	}
	
	this.AddBit(this.code.substr(pos), null);

	this.SwitchToList();
	this.div.appendChild(this.bar);
	this.div.appendChild(this.ol);
}

dp.sh.Highlighter.prototype.GetKeywords = function(str) 
{
	return '\\b' + str.replace(/ /g, '\\b|\\b') + '\\b';
}

dp.sh.BloggerMode = function()
{
	dp.sh.isBloggerMode = true;
}

// highlightes all elements identified by name and gets source code from specified property
dp.sh.HighlightAll = function(name, showGutter /* optional */, showControls /* optional */, collapseAll /* optional */, firstLine /* optional */, showColumns /* optional */)
{
	function FindValue()
	{
		var a = arguments;
		
		for(var i = 0; i < a.length; i++)
		{
			if(a[i] === null)
				continue;
				
			if(typeof(a[i]) == 'string' && a[i] != '')
				return a[i] + '';
		
			if(typeof(a[i]) == 'object' && a[i].value != '')
				return a[i].value + '';
		}
		
		return null;
	}
	
	function IsOptionSet(value, list)
	{
		for(var i = 0; i < list.length; i++)
			if(list[i] == value)
				return true;
		
		return false;
	}
	
	function GetOptionValue(name, list, defaultValue)
	{
		var regex = new RegExp('^' + name + '\\[(\\w+)\\]$', 'gi');
		var matches = null;

		for(var i = 0; i < list.length; i++)
			if((matches = regex.exec(list[i])) != null)
				return matches[1];
		
		return defaultValue;
	}
	
	function FindTagsByName(list, name, tagName)
	{
		var tags = document.getElementsByTagName(tagName);

		for(var i = 0; i < tags.length; i++)
			if(tags[i].getAttribute('name') == name)
				list.push(tags[i]);
	}

	var elements = [];
	var highlighter = null;
	var registered = {};
	var propertyName = 'innerHTML';

	// for some reason IE doesn't find <pre/> by name, however it does see them just fine by tag name... 
	FindTagsByName(elements, name, 'pre');
	FindTagsByName(elements, name, 'textarea');

	if(elements.length === 0)
		return;

	// register all brushes
	for(var brush in dp.sh.Brushes)
	{
		var aliases = dp.sh.Brushes[brush].Aliases;

		if(aliases === null)
			continue;
		
		for(var i = 0; i < aliases.length; i++)
			registered[aliases[i]] = brush;
	}

	for(var i = 0; i < elements.length; i++)
	{
		var element = elements[i];
		var options = FindValue(
				element.attributes['class'], element.className, 
				element.attributes['language'], element.language
				);
		var language = '';

		if(options === null)
			continue;
		
		options = options.split(':');
		
		language = options[0].toLowerCase();

		if(registered[language] === null)
			continue;
		
		// instantiate a brush
		highlighter = new dp.sh.Brushes[registered[language]]();
		
		// hide the original element
		element.style.display = 'none';

        if (typeof(showGutter) === 'undefined') {
            highlighter.noGutter = IsOptionSet('nogutter', options);
        } else {
            highlighter.noGutter = !showGutter;
        }

        if (typeof(showControls) === 'undefined') {
            highlighter.addControls = !IsOptionSet('nocontrols', options);
        } else {
            highlighter.addControls = showControls;
        }

        if (typeof(collapseAll) === 'undefined') {
            highlighter.collapse = IsOptionSet('collapse', options);
        } else {
            highlighter.collapse = collapseAll;
        }

        if (typeof(showColumns) === 'undefined') {
            highlighter.showColumns = IsOptionSet('showcolumns', options);
        } else {
            highlighter.showColumns = showColumns;
        }

		// write out custom brush style
		var headNode = document.getElementsByTagName('head')[0];
		if(highlighter.Style && headNode)
		{
			var styleNode = document.createElement('style');
			styleNode.setAttribute('type', 'text/css');

			if(styleNode.styleSheet) // for IE
			{
				styleNode.styleSheet.cssText = highlighter.Style;
			}
			else // for everyone else
			{
				var textNode = document.createTextNode(highlighter.Style);
				styleNode.appendChild(textNode);
			}

			headNode.appendChild(styleNode);
		}
		
		// first line idea comes from Andrew Collington, thanks!
		highlighter.firstLine = (firstLine === null) ? parseInt(GetOptionValue('firstline', options, 1)) : firstLine;

		highlighter.Highlight(element[propertyName]);
		
		highlighter.source = element;

		element.parentNode.insertBefore(highlighter.div, element);
	}	
}

/* XML Brush */
dp.sh.Brushes.Xml = function()
{
	this.CssClass = 'dp-xml';
	this.Style =	'.dp-xml .cdata { color: #ff1493; }' +
					'.dp-xml .tag, .dp-xml .tag-name { color: #069; font-weight: bold; }' +
					'.dp-xml .attribute { color: red; }' +
					'.dp-xml .attribute-value { color: blue; }';
};

dp.sh.Brushes.Xml.prototype	= new dp.sh.Highlighter();
dp.sh.Brushes.Xml.Aliases	= ['xml', 'xhtml', 'xslt', 'html', 'xhtml'];

dp.sh.Brushes.Xml.prototype.ProcessRegexList = function()
{
	function push(array, value)
	{
		array[array.length] = value;
	}
	
	/* If only there was a way to get index of a group within a match, the whole XML
	   could be matched with the expression looking something like that:
	
	   (<!\[CDATA\[\s*.*\s*\]\]>)
	   | (<!--\s*.*\s*?-->)
	   | (<)*(\w+)*\s*(\w+)\s*=\s*(".*?"|'.*?'|\w+)(/*>)*
	   | (</?)(.*?)(/?>)
	*/
	var index	= 0;
	var match	= null;
	var regex	= null;

	// Match CDATA in the following format <![ ... [ ... ]]>
	// (\&lt;|<)\!\[[\w\s]*?\[(.|\s)*?\]\](\&gt;|>)
	this.GetMatches(new RegExp('(\&lt;|<)\\!\\[[\\w\\s]*?\\[(.|\\s)*?\\]\\](\&gt;|>)', 'gm'), 'cdata');
	
	// Match comments
	// (\&lt;|<)!--\s*.*?\s*--(\&gt;|>)
	this.GetMatches(new RegExp('(\&lt;|<)!--\\s*.*?\\s*--(\&gt;|>)', 'gm'), 'comments');

	// Match attributes and their values
	// (:|\w+)\s*=\s*(".*?"|\'.*?\'|\w+)*
	regex = new RegExp('([:\\w-\.]+)\\s*=\\s*(".*?"|\'.*?\'|\\w+)*|(\\w+)', 'gm'); // Thanks to Tomi Blinnikka of Yahoo! for fixing namespaces in attributes
	while((match = regex.exec(this.code)) != null)
	{
		if(match[1] == null)
		{
			continue;
		}
			
		push(this.matches, new dp.sh.Match(match[1], match.index, 'attribute'));
	
		// if xml is invalid and attribute has no property value, ignore it	
		if(match[2] != undefined)
		{
			push(this.matches, new dp.sh.Match(match[2], match.index + match[0].indexOf(match[2]), 'attribute-value'));
		}
	}

	// Match opening and closing tag brackets
	// (\&lt;|<)/*\?*(?!\!)|/*\?*(\&gt;|>)
	this.GetMatches(new RegExp('(\&lt;|<)/*\\?*(?!\\!)|/*\\?*(\&gt;|>)', 'gm'), 'tag');

	// Match tag names
	// (\&lt;|<)/*\?*\s*(\w+)
	regex = new RegExp('(?:\&lt;|<)/*\\?*\\s*([:\\w-\.]+)', 'gm');
	while((match = regex.exec(this.code)) != null)
	{
		push(this.matches, new dp.sh.Match(match[1], match.index + match[0].indexOf(match[1]), 'tag-name'));
	}
}

/* PHP Brush */
dp.sh.Brushes.Php = function()
{
	var funcs	=	'abs acos acosh addcslashes addslashes ' +
					'array_change_key_case array_chunk array_combine array_count_values array_diff '+
					'array_diff_assoc array_diff_key array_diff_uassoc array_diff_ukey array_fill '+
					'array_filter array_flip array_intersect array_intersect_assoc array_intersect_key '+
					'array_intersect_uassoc array_intersect_ukey array_key_exists array_keys array_map '+
					'array_merge array_merge_recursive array_multisort array_pad array_pop array_product '+
					'array_push array_rand array_reduce array_reverse array_search array_shift '+
					'array_slice array_splice array_sum array_udiff array_udiff_assoc '+
					'array_udiff_uassoc array_uintersect array_uintersect_assoc '+
					'array_uintersect_uassoc array_unique array_unshift array_values array_walk '+
					'array_walk_recursive atan atan2 atanh base64_decode base64_encode base_convert '+
					'basename bcadd bccomp bcdiv bcmod bcmul bindec bindtextdomain bzclose bzcompress '+
					'bzdecompress bzerrno bzerror bzerrstr bzflush bzopen bzread bzwrite ceil chdir '+
					'checkdate checkdnsrr chgrp chmod chop chown chr chroot chunk_split class_exists '+
					'closedir closelog copy cos cosh count count_chars date decbin dechex decoct '+
					'deg2rad delete ebcdic2ascii echo empty end ereg ereg_replace eregi eregi_replace error_log '+
					'error_reporting escapeshellarg escapeshellcmd eval exec exit exp explode extension_loaded '+
					'feof fflush fgetc fgetcsv fgets fgetss file_exists file_get_contents file_put_contents '+
					'fileatime filectime filegroup fileinode filemtime fileowner fileperms filesize filetype '+
					'floatval flock floor flush fmod fnmatch fopen fpassthru fprintf fputcsv fputs fread fscanf '+
					'fseek fsockopen fstat ftell ftok getallheaders getcwd getdate getenv gethostbyaddr gethostbyname '+
					'gethostbynamel getimagesize getlastmod getmxrr getmygid getmyinode getmypid getmyuid getopt '+
					'getprotobyname getprotobynumber getrandmax getrusage getservbyname getservbyport gettext '+
					'gettimeofday gettype glob gmdate gmmktime ini_alter ini_get ini_get_all ini_restore ini_set '+
					'interface_exists intval ip2long is_a is_array is_bool is_callable is_dir is_double '+
					'is_executable is_file is_finite is_float is_infinite is_int is_integer is_link is_long '+
					'is_nan is_null is_numeric is_object is_readable is_real is_resource is_scalar is_soap_fault '+
					'is_string is_subclass_of is_uploaded_file is_writable is_writeable mkdir mktime nl2br '+
					'parse_ini_file parse_str parse_url passthru pathinfo readlink realpath rewind rewinddir rmdir '+
					'round str_ireplace str_pad str_repeat str_replace str_rot13 str_shuffle str_split '+
					'str_word_count strcasecmp strchr strcmp strcoll strcspn strftime strip_tags stripcslashes '+
					'stripos stripslashes stristr strlen strnatcasecmp strnatcmp strncasecmp strncmp strpbrk '+
					'strpos strptime strrchr strrev strripos strrpos strspn strstr strtok strtolower strtotime '+
					'strtoupper strtr strval substr substr_compare';

	var keywords =	'and or xor __FILE__ __LINE__ array as break case ' +
					'cfunction class const continue declare default die do else ' +
					'elseif empty enddeclare endfor endforeach endif endswitch endwhile ' +
					'extends for foreach function include include_once global if ' +
					'new old_function return static switch use require require_once ' +
					'var while __FUNCTION__ __CLASS__ ' +
					'__METHOD__ abstract interface public implements extends private protected throw';

	this.regexList = [
		{ regex: dp.sh.RegexLib.SingleLineCComments,				css: 'comment' },			// one line comments
		{ regex: dp.sh.RegexLib.SingleLinePerlComments,				css: 'comment' },			// one line comments
		{ regex: dp.sh.RegexLib.MultiLineCComments,					css: 'comment' },			// multiline comments
		{ regex: dp.sh.RegexLib.DoubleQuotedString,					css: 'string' },			// double quoted strings
		{ regex: dp.sh.RegexLib.SingleQuotedString,					css: 'string' },			// single quoted strings
		{ regex: new RegExp('\\$\\w+', 'g'),						css: 'vars' },				// variables
		{ regex: new RegExp(this.GetKeywords(funcs), 'gmi'),		css: 'func' },				// functions
		{ regex: new RegExp(this.GetKeywords(keywords), 'gm'),		css: 'keyword' }			// keyword
		];

	this.CssClass = 'dp-c';
};

dp.sh.Brushes.Php.prototype	= new dp.sh.Highlighter();
dp.sh.Brushes.Php.Aliases	= ['php'];

/* JS Brush */
dp.sh.Brushes.JScript = function()
{
	var keywords =	'abstract boolean break byte case catch char class const continue debugger ' +
					'default delete do double else enum export extends false final finally float ' +
					'for function goto if implements import in instanceof int interface long native ' +
					'new null package private protected public return short static super switch ' +
					'synchronized this throw throws transient true try typeof var void volatile while with';

	this.regexList = [
		{ regex: dp.sh.RegexLib.SingleLineCComments,				css: 'comment' },			// one line comments
		{ regex: dp.sh.RegexLib.MultiLineCComments,					css: 'comment' },			// multiline comments
		{ regex: dp.sh.RegexLib.DoubleQuotedString,					css: 'string' },			// double quoted strings
		{ regex: dp.sh.RegexLib.SingleQuotedString,					css: 'string' },			// single quoted strings
		{ regex: new RegExp('^\\s*#.*', 'gm'),						css: 'preprocessor' },		// preprocessor tags like #region and #endregion
		{ regex: new RegExp(this.GetKeywords(keywords), 'gm'),		css: 'keyword' }			// keywords
		];

	this.CssClass = 'dp-c';
};

dp.sh.Brushes.JScript.prototype	= new dp.sh.Highlighter();
dp.sh.Brushes.JScript.Aliases	= ['js', 'jscript', 'javascript'];

/* CSS Brush */
dp.sh.Brushes.CSS = function()
{
	var keywords =	'ascent azimuth background-attachment background-color background-image background-position ' +
					'background-repeat background baseline bbox border-collapse border-color border-spacing border-style border-top ' +
					'border-right border-bottom border-left border-top-color border-right-color border-bottom-color border-left-color ' +
					'border-top-style border-right-style border-bottom-style border-left-style border-top-width border-right-width ' +
					'border-bottom-width border-left-width border-width border cap-height caption-side centerline clear clip color ' +
					'content counter-increment counter-reset cue-after cue-before cue cursor definition-src descent direction display ' +
					'elevation empty-cells float font-size-adjust font-family font-size font-stretch font-style font-variant font-weight font ' +
					'height letter-spacing line-height list-style-image list-style-position list-style-type list-style margin-top ' +
					'margin-right margin-bottom margin-left margin marker-offset marks mathline max-height max-width min-height min-width orphans ' +
					'outline-color outline-style outline-width outline overflow padding-top padding-right padding-bottom padding-left padding page ' +
					'page-break-after page-break-before page-break-inside pause pause-after pause-before pitch pitch-range play-during position ' +
					'quotes richness size slope src speak-header speak-numeral speak-punctuation speak speech-rate stemh stemv stress ' +
					'table-layout text-align text-decoration text-indent text-shadow text-transform unicode-bidi unicode-range units-per-em ' +
					'vertical-align visibility voice-family volume white-space widows width widths word-spacing x-height z-index';

	var values =	'above absolute all always aqua armenian attr aural auto avoid baseline behind below bidi-override black blink block blue bold bolder '+
					'both bottom braille capitalize caption center center-left center-right circle close-quote code collapse compact condensed '+
					'continuous counter counters crop cross crosshair cursive dashed decimal decimal-leading-zero default digits disc dotted double '+
					'embed embossed e-resize expanded extra-condensed extra-expanded fantasy far-left far-right fast faster fixed format fuchsia '+
					'gray green groove handheld hebrew help hidden hide high higher icon inline-table inline inset inside invert italic '+
					'justify landscape large larger left-side left leftwards level lighter lime line-through list-item local loud lower-alpha '+
					'lowercase lower-greek lower-latin lower-roman lower low ltr marker maroon medium message-box middle mix move narrower '+
					'navy ne-resize no-close-quote none no-open-quote no-repeat normal nowrap n-resize nw-resize oblique olive once open-quote outset '+
					'outside overline pointer portrait pre print projection purple red relative repeat repeat-x repeat-y rgb ridge right right-side '+
					'rightwards rtl run-in screen scroll semi-condensed semi-expanded separate se-resize show silent silver slower slow '+
					'small small-caps small-caption smaller soft solid speech spell-out square s-resize static status-bar sub super sw-resize '+
					'table-caption table-cell table-column table-column-group table-footer-group table-header-group table-row table-row-group teal '+
					'text-bottom text-top thick thin top transparent tty tv ultra-condensed ultra-expanded underline upper-alpha uppercase upper-latin '+
					'upper-roman url visible wait white wider w-resize x-fast x-high x-large x-loud x-low x-slow x-small x-soft xx-large xx-small yellow';
	
	var fonts =		'[mM]onospace [tT]ahoma [vV]erdana [aA]rial [hH]elvetica [sS]ans-serif [sS]erif';

	this.regexList = [
		{ regex: dp.sh.RegexLib.MultiLineCComments,						css: 'comment' },	// multiline comments
		{ regex: dp.sh.RegexLib.DoubleQuotedString,						css: 'string' },	// double quoted strings
		{ regex: dp.sh.RegexLib.SingleQuotedString,						css: 'string' },	// single quoted strings
		{ regex: new RegExp('\\#[a-zA-Z0-9]{3,6}', 'g'),				css: 'value' },		// html colors
		{ regex: new RegExp('(-?\\d+)(\.\\d+)?(px|em|pt|\:|\%|)', 'g'),	css: 'value' },		// sizes
		{ regex: new RegExp('!important', 'g'),							css: 'important' },	// !important
		{ regex: new RegExp(this.GetKeywordsCSS(keywords), 'gm'),		css: 'keyword' },	// keywords
		{ regex: new RegExp(this.GetValuesCSS(values), 'g'),			css: 'value' },		// values
		{ regex: new RegExp(this.GetValuesCSS(fonts), 'g'),				css: 'value' }		// fonts
		];

	this.CssClass = 'dp-css';
	this.Style =	'.dp-css .value { color: black; }' +
					'.dp-css .important { color: red; }';
};

dp.sh.Highlighter.prototype.GetKeywordsCSS = function(str)
{
	return '\\b([a-z_]|)' + str.replace(/ /g, '(?=:)\\b|\\b([a-z_\\*]|\\*|)') + '(?=:)\\b';
};

dp.sh.Highlighter.prototype.GetValuesCSS = function(str)
{
	return '\\b' + str.replace(/ /g, '(?!-)(?!:)\\b|\\b()') + '\:\\b';
};

dp.sh.Brushes.CSS.prototype	= new dp.sh.Highlighter();
dp.sh.Brushes.CSS.Aliases	= ['css'];
