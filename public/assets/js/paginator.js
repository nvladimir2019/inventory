class Paginator {
    render(elements, currentPage, lastPage) {
        if(elements[0] === undefined || elements[0][1] === undefined) {
            return '';
        }

        let paginator = "";

        paginator += `<li class="page-item 
            ${currentPage === 1 ? 'disabled' : ''}"><span class="page-link" data-page="
            ${currentPage - 1}">‹</span></li>`;

        for(let k in elements) {
            if(elements.hasOwnProperty(k) && typeof elements[k] === 'object') {
                for(let i in elements[k]) {
                    if(elements[k].hasOwnProperty(i)) {
                        paginator += `<li class="page-item 
                            ${currentPage === elements[k][i] ? 'active' : ''}"><span class="page-link" data-page="
                            ${elements[k][i]}">${elements[k][i]}</span></li>`;
                    }
                }
            }
            else {
                paginator += `<li class="page-item disabled"><span class="page-link">${elements[k]}</span></li>`;
            }
        }

        paginator += `<li class="page-item 
            ${currentPage === lastPage ? 'disabled' : ''}"><span class="page-link" data-page="
            ${currentPage + 1}">›</span></li>`;

        return paginator;
    }
}
