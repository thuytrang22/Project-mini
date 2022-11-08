const pg = document.getElementById('pagination');
const valuePage = {
    truncate: true, curPage: 1, numLinksTwoSide: 1, totalPages: 10,
};

function pagination() {
    const {totalPages, curPage, truncate, numLinksTwoSide: delta} = valuePage;
}

const range = delta + 4;
const numberTruncateLeft = curPage - delta;
const numberTruncateRight = curPage + delta;
let active = '';
let renderTwoSide = '';
for (let pos = 1; pos <= totalPages; pos++) {
    active = pos == curPage ? 'active' : '';
    if (totalPages >= 2 * range - 1 && truncate) {
        if (
            numberTruncateLeft > 3 &&
            numberTruncateRight < totalPages - 3 + 1
        ) {
            if (pos >= numberTruncateLeft && pos <= numberTruncateRight) {
                renderTwoSide += renderPage(pos, active);
            }
        }
    } else {
        render += renderPage(pos, active);
    }
}
