const replaceRegex = function(regex, replacement){
	return function(str){
		return str.replace(regex, replacement);
	}
}

const headingRegex = /\n(#+\s*)(.*)/g;
const boldItalicsRegex = /(\*{1,2})(.*?)\1/g;
const strikethroughRegex = /(\~\~)(.*?)\1/g;
const unorderedListRegex = /(\n\s*(\-|\+)\s.*)+/g;
const orderedListRegex = /(\n\s*([0-9]+\.)\s.*)+/g;
const paragraphRegex = /\n+(?!<pre>)(?!<h)(?!<ul>)(?!<blockquote)(?!<hr)(?!\t)([^\n]+)\n/g;

const headingReplacer = function(fullMatch, tagStart, tagContents){
	return '\n<h' + tagStart.trim().length + '>' + tagContents + '</h' + tagStart.trim().length + '>';
}
const boldItalicsReplacer = function(fullMatch, tagStart, tagContents){
	return '<' + ( (tagStart.trim().length==1)?('em'):('strong') ) + '>'+ tagContents + '</' + ( (tagStart.trim().length==1)?('em'):('strong') ) + '>';
}
const strikethroughReplacer = function(fullMatch, tagStart, tagContents){
	return '<del>' + tagContents + '</del>';
}
const unorderedListReplacer = function(fullMatch){
	let items = '';
	fullMatch.trim().split('\n').forEach( item => { items += '<li>' + item.substring(2) + '</li>'; } );
	return '\n<ul>' + items + '</ul>';
}
const orderedListReplacer = function(fullMatch){
	let items = '';
	fullMatch.trim().split('\n').forEach( item => { items += '<li>' + item.substring(item.indexOf('.')+2) + '</li>'; } );
	return '\n<ol>' + items + '</ol>';
}
const paragraphReplacer = function(fullMatch, tagContents){
	return '<p>' + tagContents + '</p>';
}

const replaceHeadings = replaceRegex(headingRegex, headingReplacer);
const replaceBoldItalics = replaceRegex(boldItalicsRegex, boldItalicsReplacer);
const replaceceStrikethrough = replaceRegex(strikethroughRegex, strikethroughReplacer);
const replaceUnorderedLists = replaceRegex(unorderedListRegex, unorderedListReplacer);
const replaceOrderedLists = replaceRegex(orderedListRegex, orderedListReplacer);
const replaceParagraphs = replaceRegex(paragraphRegex, paragraphReplacer);

export function replaceMarkdown(str){
    return replaceParagraphs(replaceOrderedLists(replaceUnorderedLists(
        replaceceStrikethrough(replaceBoldItalics(replaceHeadings(str)
        )))))
}