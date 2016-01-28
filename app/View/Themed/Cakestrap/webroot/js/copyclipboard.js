function createNode(text) {
    var node = document.createElement('pre');
    node.style.width = '1px';
    node.style.height = '1px';
    node.style.position = 'fixed';
    node.style.top = '5px';
    node.textContent = text;
    return node;
  }

function copyNode(node) {
    var selection = getSelection();
    selection.removeAllRanges();

    var range = document.createRange();
    range.selectNodeContents(node);
    selection.addRange(range);

    document.execCommand('copy');
    selection.removeAllRanges();
  }

function copyText(text) {
    var node = createNode(text);
    document.body.appendChild(node);
    copyNode(node);
    document.body.removeChild(node);
  }

function createTooltip(){

}

function copy(element, targetId){
	var target = document.getElementById(targetId);
	if(target){
		copyText(target.value);
		return true;
	}
	return false;
}
