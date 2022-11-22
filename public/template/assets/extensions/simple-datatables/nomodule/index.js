System.register([],(function(t,e){"use strict";return{execute:function(){const s=t=>"[object Object]"===Object.prototype.toString.call(t),a=(t,e)=>{const s=document.createElement(t);if(e&&"object"==typeof e)for(const t in e)"html"===t?s.innerHTML=e[t]:s.setAttribute(t,e[t]);return s},i=t=>{t instanceof NodeList?t.forEach((t=>i(t))):t.innerHTML=""},n=(t,e,s)=>a("li",{class:t,html:`<a href="#" data-page="${e}">${s}</a>`}),h=(t,e)=>{let s,a;1===e?(s=0,a=t.length):-1===e&&(s=t.length-1,a=-1);for(let i=!0;i;){i=!1;for(let n=s;n!=a;n+=e)if(t[n+e]&&t[n].value>t[n+e].value){const s=t[n],a=t[n+e],h=s;t[n]=a,t[n+e]=h,i=!0}}return t};class l{constructor(t,e){return this.dt=t,this.rows=e,this}build(t){const e=a("tr");let s=this.dt.headings;return s.length||(s=t.map((()=>""))),s.forEach(((s,i)=>{const n=a("td");t[i]&&t[i].length||(t[i]=""),n.innerHTML=t[i],n.data=t[i],e.appendChild(n)})),e}render(t){return t}add(t){if(Array.isArray(t)){const e=this.dt;Array.isArray(t[0])?t.forEach((t=>{e.data.push(this.build(t))})):e.data.push(this.build(t)),e.data.length&&(e.hasRows=!0),this.update(),e.columns().rebuild()}}remove(t){const e=this.dt;Array.isArray(t)?(t.sort(((t,e)=>e-t)),t.forEach((t=>{e.data.splice(t,1)}))):"all"==t?e.data=[]:e.data.splice(t,1),e.data.length||(e.hasRows=!1),this.update(),e.columns().rebuild()}update(){this.dt.data.forEach(((t,e)=>{t.dataIndex=e}))}}class r{constructor(t){return this.dt=t,this}swap(t){if(t.length&&2===t.length){const e=[];this.dt.headings.forEach(((t,s)=>{e.push(s)}));const s=t[0],a=t[1],i=e[a];e[a]=e[s],e[s]=i,this.order(e)}}order(t){let e,s,a,i,n,h,l;const r=[[],[],[],[]],o=this.dt;t.forEach(((t,a)=>{n=o.headings[t],h="false"!==n.getAttribute("data-sortable"),e=n.cloneNode(!0),e.originalCellIndex=a,e.sortable=h,r[0].push(e),o.hiddenColumns.includes(t)||(s=n.cloneNode(!0),s.originalCellIndex=a,s.sortable=h,r[1].push(s))})),o.data.forEach(((e,s)=>{a=e.cloneNode(!1),i=e.cloneNode(!1),a.dataIndex=i.dataIndex=s,null!==e.searchIndex&&void 0!==e.searchIndex&&(a.searchIndex=i.searchIndex=e.searchIndex),t.forEach((t=>{l=e.cells[t].cloneNode(!0),l.data=e.cells[t].data,a.appendChild(l),o.hiddenColumns.includes(t)||(l=e.cells[t].cloneNode(!0),l.data=e.cells[t].data,i.appendChild(l))})),r[2].push(a),r[3].push(i)})),o.headings=r[0],o.activeHeadings=r[1],o.data=r[2],o.activeRows=r[3],o.update()}hide(t){if(t.length){const e=this.dt;t.forEach((t=>{e.hiddenColumns.includes(t)||e.hiddenColumns.push(t)})),this.rebuild()}}show(t){if(t.length){let e;const s=this.dt;t.forEach((t=>{e=s.hiddenColumns.indexOf(t),e>-1&&s.hiddenColumns.splice(e,1)})),this.rebuild()}}visible(t){let e;const s=this.dt;return t=t||s.headings.map((t=>t.originalCellIndex)),isNaN(t)?Array.isArray(t)&&(e=[],t.forEach((t=>{e.push(!s.hiddenColumns.includes(t))}))):e=!s.hiddenColumns.includes(t),e}add(t){let e;const s=document.createElement("th");if(!this.dt.headings.length)return this.dt.insert({headings:[t.heading],data:t.data.map((t=>[t]))}),void this.rebuild();this.dt.hiddenHeader?s.innerHTML="":t.heading.nodeName?s.appendChild(t.heading):s.innerHTML=t.heading,this.dt.headings.push(s),this.dt.data.forEach(((s,a)=>{t.data[a]&&(e=document.createElement("td"),t.data[a].nodeName?e.appendChild(t.data[a]):e.innerHTML=t.data[a],e.data=e.innerHTML,t.render&&(e.innerHTML=t.render.call(this,e.data,e,s)),s.appendChild(e))})),t.type&&s.setAttribute("data-type",t.type),t.format&&s.setAttribute("data-format",t.format),t.hasOwnProperty("sortable")&&(s.sortable=t.sortable,s.setAttribute("data-sortable",!0===t.sortable?"true":"false")),this.rebuild(),this.dt.renderHeader()}remove(t){Array.isArray(t)?(t.sort(((t,e)=>e-t)),t.forEach((t=>this.remove(t)))):(this.dt.headings.splice(t,1),this.dt.data.forEach((e=>{e.removeChild(e.cells[t])}))),this.rebuild()}filter(t,e,s,a){const i=this.dt;if(i.filterState||(i.filterState={originalData:i.data}),!i.filterState[t]){const e=[...a,()=>!0];i.filterState[t]=function(){let t=0;return()=>e[t++%e.length]}()}const n=i.filterState[t](),h=Array.from(i.filterState.originalData).filter((e=>{const s=e.cells[t],a=s.hasAttribute("data-content")?s.getAttribute("data-content"):s.innerText;return"function"==typeof n?n(a):a===n}));i.data=h,this.rebuild(),i.update(),s||i.emit("datatable.sort",t,e)}sort(t,s,a){const i=this.dt;if(i.hasHeadings&&(t<0||t>i.headings.length))return!1;const n=i.options.filters&&i.options.filters[i.headings[t].textContent];if(n&&0!==n.length)return void this.filter(t,s,a,n);i.sorting=!0,a||i.emit("datatable.sorting",t,s);let l=i.data;const r=[],o=[];let d=0,c=0;const p=i.headings[t],g=[];if("date"===p.getAttribute("data-type")){let t=!1;p.hasAttribute("data-format")&&(t=p.getAttribute("data-format")),g.push(e.import("./date-88c20685.js").then((({parseDate:e})=>s=>e(s,t))))}Promise.all(g).then((e=>{const n=e[0];let g,u;Array.from(l).forEach((e=>{const s=e.cells[t],a=s.hasAttribute("data-content")?s.getAttribute("data-content"):s.innerText;let i;i=n?n(a):"string"==typeof a?a.replace(/(\$|,|\s|%)/g,""):a,parseFloat(i)==i?o[c++]={value:Number(i),row:e}:r[d++]={value:"string"==typeof a?a.toLowerCase():a,row:e}})),s||(s=p.classList.contains("asc")?"desc":"asc"),"desc"==s?(g=h(r,-1),u=h(o,-1),p.classList.remove("asc"),p.classList.add("desc")):(g=h(o,1),u=h(r,1),p.classList.remove("desc"),p.classList.add("asc")),i.lastTh&&p!=i.lastTh&&(i.lastTh.classList.remove("desc"),i.lastTh.classList.remove("asc")),i.lastTh=p,l=g.concat(u),i.data=[];const f=[];l.forEach(((t,e)=>{i.data.push(t.row),null!==t.row.searchIndex&&void 0!==t.row.searchIndex&&f.push(e)})),i.searchData=f,this.rebuild(),i.update(),a||i.emit("datatable.sort",t,s)}))}rebuild(){let t,e,s,a;const i=this.dt,n=[];i.activeRows=[],i.activeHeadings=[],i.headings.forEach(((t,e)=>{t.originalCellIndex=e,t.sortable="false"!==t.getAttribute("data-sortable"),i.hiddenColumns.includes(e)||i.activeHeadings.push(t)})),i.data.forEach(((h,l)=>{t=h.cloneNode(!1),e=h.cloneNode(!1),t.dataIndex=e.dataIndex=l,null!==h.searchIndex&&void 0!==h.searchIndex&&(t.searchIndex=e.searchIndex=h.searchIndex),Array.from(h.cells).forEach((n=>{s=n.cloneNode(!0),s.data=n.data,t.appendChild(s),i.hiddenColumns.includes(s.cellIndex)||(a=s.cloneNode(!0),a.data=s.data,e.appendChild(a))})),n.push(t),i.activeRows.push(e)})),i.data=n,i.update()}}const o=function(t){let e=!1,s=!1;if((t=t||this.options.data).headings){e=a("thead");const s=a("tr");t.headings.forEach((t=>{const e=a("th",{html:t});s.appendChild(e)})),e.appendChild(s)}t.data&&t.data.length&&(s=a("tbody"),t.data.forEach((e=>{if(t.headings&&t.headings.length!==e.length)throw new Error("The number of rows do not match the number of headings.");const i=a("tr");e.forEach((t=>{const e=a("td",{html:t});i.appendChild(e)})),s.appendChild(i)}))),e&&(null!==this.table.tHead&&this.table.removeChild(this.table.tHead),this.table.appendChild(e)),s&&(this.table.tBodies.length&&this.table.removeChild(this.table.tBodies[0]),this.table.appendChild(s))},d={sortable:!0,searchable:!0,paging:!0,perPage:10,perPageSelect:[5,10,15,20,25],nextPrev:!0,firstLast:!1,prevText:"&lsaquo;",nextText:"&rsaquo;",firstText:"&laquo;",lastText:"&raquo;",ellipsisText:"&hellip;",ascText:"▴",descText:"▾",truncatePager:!0,pagerDelta:2,scrollY:"",fixedColumns:!0,fixedHeight:!1,header:!0,hiddenHeader:!1,footer:!1,labels:{placeholder:"Search...",perPage:"{select} entries per page",noRows:"No entries found",info:"Showing {start} to {end} of {rows} entries"},layout:{top:"{select}{search}",bottom:"{info}{pager}"}};class c{constructor(t,e={}){if(this.initialized=!1,this.options={...d,...e,layout:{...d.layout,...e.layout},labels:{...d.labels,...e.labels}},"string"==typeof t&&(t=document.querySelector(t)),this.initialLayout=t.innerHTML,this.initialSortable=this.options.sortable,this.options.header||(this.options.sortable=!1),null===t.tHead&&(!this.options.data||this.options.data&&!this.options.data.headings)&&(this.options.sortable=!1),t.tBodies.length&&!t.tBodies[0].rows.length&&this.options.data&&!this.options.data.data)throw new Error("You seem to be using the data option, but you've not defined any rows.");this.table=t,this.listeners={onResize:t=>this.onResize(t)},this.init()}static extend(t,e){"function"==typeof e?c.prototype[t]=e:c[t]=e}init(t){if(this.initialized||this.table.classList.contains("dataTable-table"))return!1;Object.assign(this.options,t||{}),this.currentPage=1,this.onFirstPage=!0,this.hiddenColumns=[],this.columnRenderers=[],this.selectedColumns=[],this.render(),setTimeout((()=>{this.emit("datatable.init"),this.initialized=!0,this.options.plugins&&Object.entries(this.options.plugins).forEach((([t,e])=>{this[t]&&"function"==typeof this[t]&&(this[t]=this[t](e,{createElement:a}),e.enabled&&this[t].init&&"function"==typeof this[t].init&&this[t].init())}))}),10)}render(t){if(t){switch(t){case"page":this.renderPage();break;case"pager":this.renderPager();break;case"header":this.renderHeader()}return!1}const e=this.options;let s="";if(e.data&&o.call(this),this.body=this.table.tBodies[0],this.head=this.table.tHead,this.foot=this.table.tFoot,this.body||(this.body=a("tbody"),this.table.appendChild(this.body)),this.hasRows=this.body.rows.length>0,!this.head){const t=a("thead"),s=a("tr");this.hasRows&&(Array.from(this.body.rows[0].cells).forEach((()=>{s.appendChild(a("th"))})),t.appendChild(s)),this.head=t,this.table.insertBefore(this.head,this.body),this.hiddenHeader=e.hiddenHeader}if(this.headings=[],this.hasHeadings=this.head.rows.length>0,this.hasHeadings&&(this.header=this.head.rows[0],this.headings=[].slice.call(this.header.cells)),e.header||this.head&&this.table.removeChild(this.table.tHead),e.footer?this.head&&!this.foot&&(this.foot=a("tfoot",{html:this.head.innerHTML}),this.table.appendChild(this.foot)):this.foot&&this.table.removeChild(this.table.tFoot),this.wrapper=a("div",{class:"dataTable-wrapper dataTable-loading"}),s+="<div class='dataTable-top'>",s+=e.layout.top,s+="</div>",e.scrollY.length?s+=`<div class='dataTable-container' style='height: ${e.scrollY}; overflow-Y: auto;'></div>`:s+="<div class='dataTable-container'></div>",s+="<div class='dataTable-bottom'>",s+=e.layout.bottom,s+="</div>",s=s.replace("{info}",e.paging?"<div class='dataTable-info'></div>":""),e.paging&&e.perPageSelect){let t="<div class='dataTable-dropdown'><label>";t+=e.labels.perPage,t+="</label></div>";const i=a("select",{class:"dataTable-selector"});e.perPageSelect.forEach((t=>{const s=t===e.perPage,a=new Option(t,t,s,s);i.add(a)})),t=t.replace("{select}",i.outerHTML),s=s.replace("{select}",t)}else s=s.replace("{select}","");if(e.searchable){const t=`<div class='dataTable-search'><input class='dataTable-input' placeholder='${e.labels.placeholder}' type='text'></div>`;s=s.replace("{search}",t)}else s=s.replace("{search}","");this.hasHeadings&&this.render("header"),this.table.classList.add("dataTable-table");const i=a("nav",{class:"dataTable-pagination"}),n=a("ul",{class:"dataTable-pagination-list"});i.appendChild(n),s=s.replace(/\{pager\}/g,i.outerHTML),this.wrapper.innerHTML=s,this.container=this.wrapper.querySelector(".dataTable-container"),this.pagers=this.wrapper.querySelectorAll(".dataTable-pagination-list"),this.label=this.wrapper.querySelector(".dataTable-info"),this.table.parentNode.replaceChild(this.wrapper,this.table),this.container.appendChild(this.table),this.rect=this.table.getBoundingClientRect(),this.data=Array.from(this.body.rows),this.activeRows=this.data.slice(),this.activeHeadings=this.headings.slice(),this.update(),this.setColumns(),this.fixHeight(),this.fixColumns(),e.header||this.wrapper.classList.add("no-header"),e.footer||this.wrapper.classList.add("no-footer"),e.sortable&&this.wrapper.classList.add("sortable"),e.searchable&&this.wrapper.classList.add("searchable"),e.fixedHeight&&this.wrapper.classList.add("fixed-height"),e.fixedColumns&&this.wrapper.classList.add("fixed-columns"),this.bindEvents()}renderPage(){if(this.hasHeadings&&(i(this.header),this.activeHeadings.forEach((t=>this.header.appendChild(t)))),this.hasRows&&this.totalPages){this.currentPage>this.totalPages&&(this.currentPage=1);const t=this.currentPage-1,e=document.createDocumentFragment();this.pages[t].forEach((t=>e.appendChild(this.rows().render(t)))),this.clear(e),this.onFirstPage=1===this.currentPage,this.onLastPage=this.currentPage===this.lastPage}else this.setMessage(this.options.labels.noRows);let t,e=0,s=0,a=0;if(this.totalPages&&(e=this.currentPage-1,s=e*this.options.perPage,a=s+this.pages[e].length,s+=1,t=this.searching?this.searchData.length:this.data.length),this.label&&this.options.labels.info.length){const e=this.options.labels.info.replace("{start}",s).replace("{end}",a).replace("{page}",this.currentPage).replace("{pages}",this.totalPages).replace("{rows}",t);this.label.innerHTML=t?e:""}1==this.currentPage&&this.fixHeight()}renderPager(){if(i(this.pagers),this.totalPages>1){const t="pager",e=document.createDocumentFragment(),s=this.onFirstPage?1:this.currentPage-1,i=this.onLastPage?this.totalPages:this.currentPage+1;this.options.firstLast&&e.appendChild(n(t,1,this.options.firstText)),this.options.nextPrev&&e.appendChild(n(t,s,this.options.prevText));let h=this.links;this.options.truncatePager&&(h=((t,e,s,i,n)=>{let h;const l=2*(i=i||2);let r=e-i,o=e+i;const d=[],c=[];e<4-i+l?o=3+l:e>s-(3-i+l)&&(r=s-(2+l));for(let e=1;e<=s;e++)if(1==e||e==s||e>=r&&e<=o){const s=t[e-1];s.classList.remove("active"),d.push(s)}return d.forEach((e=>{const s=e.children[0].getAttribute("data-page");if(h){const e=h.children[0].getAttribute("data-page");if(s-e==2)c.push(t[e]);else if(s-e!=1){const t=a("li",{class:"ellipsis",html:`<a href="#">${n}</a>`});c.push(t)}}c.push(e),h=e})),c})(this.links,this.currentPage,this.pages.length,this.options.pagerDelta,this.options.ellipsisText)),this.links[this.currentPage-1].classList.add("active"),h.forEach((t=>{t.classList.remove("active"),e.appendChild(t)})),this.links[this.currentPage-1].classList.add("active"),this.options.nextPrev&&e.appendChild(n(t,i,this.options.nextText)),this.options.firstLast&&e.appendChild(n(t,this.totalPages,this.options.lastText)),this.pagers.forEach((t=>{t.appendChild(e.cloneNode(!0))}))}}renderHeader(){this.labels=[],this.headings&&this.headings.length&&this.headings.forEach(((t,e)=>{if(this.labels[e]=t.textContent,t.firstElementChild&&t.firstElementChild.classList.contains("dataTable-sorter")&&(t.innerHTML=t.firstElementChild.innerHTML),t.sortable="false"!==t.getAttribute("data-sortable"),t.originalCellIndex=e,this.options.sortable&&t.sortable){const e=a("a",{href:"#",class:"dataTable-sorter",html:t.innerHTML});t.innerHTML="",t.setAttribute("data-sortable",""),t.appendChild(e)}})),this.fixColumns()}bindEvents(){const t=this.options;if(t.perPageSelect){const e=this.wrapper.querySelector(".dataTable-selector");e&&e.addEventListener("change",(()=>{t.perPage=parseInt(e.value,10),this.update(),this.fixHeight(),this.emit("datatable.perpage",t.perPage)}),!1)}t.searchable&&(this.input=this.wrapper.querySelector(".dataTable-input"),this.input&&this.input.addEventListener("keyup",(()=>this.search(this.input.value)),!1)),this.wrapper.addEventListener("click",(e=>{const s=e.target.closest("a");s&&"a"===s.nodeName.toLowerCase()&&(s.hasAttribute("data-page")?(this.page(s.getAttribute("data-page")),e.preventDefault()):t.sortable&&s.classList.contains("dataTable-sorter")&&"false"!=s.parentNode.getAttribute("data-sortable")&&(this.columns().sort(this.headings.indexOf(s.parentNode)),e.preventDefault()))}),!1),window.addEventListener("resize",this.listeners.onResize)}onResize(){this.rect=this.container.getBoundingClientRect(),this.rect.width&&this.fixColumns()}setColumns(t){t||this.data.forEach((t=>{Array.from(t.cells).forEach((t=>{t.data=t.innerHTML}))})),this.options.columns&&this.headings.length&&this.options.columns.forEach((t=>{Array.isArray(t.select)||(t.select=[t.select]),t.hasOwnProperty("render")&&"function"==typeof t.render&&(this.selectedColumns=this.selectedColumns.concat(t.select),this.columnRenderers.push({columns:t.select,renderer:t.render})),t.select.forEach((e=>{const s=this.headings[e];t.type&&s.setAttribute("data-type",t.type),t.format&&s.setAttribute("data-format",t.format),t.hasOwnProperty("sortable")&&s.setAttribute("data-sortable",t.sortable),t.hasOwnProperty("hidden")&&!1!==t.hidden&&this.columns().hide([e]),t.hasOwnProperty("sort")&&1===t.select.length&&this.columns().sort(t.select[0],t.sort,!0)}))})),this.hasRows&&(this.data.forEach(((t,e)=>{t.dataIndex=e,Array.from(t.cells).forEach((t=>{t.data=t.innerHTML}))})),this.selectedColumns.length&&this.data.forEach((t=>{Array.from(t.cells).forEach(((e,s)=>{this.selectedColumns.includes(s)&&this.columnRenderers.forEach((a=>{a.columns.includes(s)&&(e.innerHTML=a.renderer.call(this,e.data,e,t))}))}))})),this.columns().rebuild()),this.render("header")}destroy(){this.table.innerHTML=this.initialLayout,this.table.classList.remove("dataTable-table"),this.wrapper.parentNode.replaceChild(this.table,this.wrapper),this.initialized=!1,window.removeEventListener("resize",this.listeners.onResize)}update(){this.wrapper.classList.remove("dataTable-empty"),this.paginate(this),this.render("page"),this.links=[];let t=this.pages.length;for(;t--;){const e=t+1;this.links[t]=n(0===t?"active":"",e,e)}this.sorting=!1,this.render("pager"),this.rows().update(),this.emit("datatable.update")}paginate(){const t=this.options.perPage;let e=this.activeRows;return this.searching&&(e=[],this.searchData.forEach((t=>e.push(this.activeRows[t])))),this.options.paging?this.pages=e.map(((s,a)=>a%t==0?e.slice(a,a+t):null)).filter((t=>t)):this.pages=[e],this.totalPages=this.lastPage=this.pages.length,this.totalPages}fixColumns(){if((this.options.scrollY.length||this.options.fixedColumns)&&this.activeHeadings&&this.activeHeadings.length){let t,e=!1;if(this.columnWidths=[],this.table.tHead){if(this.options.scrollY.length&&(e=a("thead"),e.appendChild(a("tr")),e.style.height="0px",this.headerTable&&(this.table.tHead=this.headerTable.tHead)),this.activeHeadings.forEach((t=>{t.style.width=""})),this.activeHeadings.forEach(((t,s)=>{const i=t.offsetWidth,n=i/this.rect.width*100;if(t.style.width=`${n}%`,this.columnWidths[s]=i,this.options.scrollY.length){const t=a("th");e.firstElementChild.appendChild(t),t.style.width=`${n}%`,t.style.paddingTop="0",t.style.paddingBottom="0",t.style.border="0"}})),this.options.scrollY.length){const t=this.table.parentElement;if(!this.headerTable){this.headerTable=a("table",{class:"dataTable-table"});const e=a("div",{class:"dataTable-headercontainer"});e.appendChild(this.headerTable),t.parentElement.insertBefore(e,t)}const s=this.table.tHead;this.table.replaceChild(e,s),this.headerTable.tHead=s,this.headerTable.parentElement.style.paddingRight=`${this.headerTable.clientWidth-this.table.clientWidth+parseInt(this.headerTable.parentElement.style.paddingRight||"0",10)}px`,t.scrollHeight>t.clientHeight&&(t.style.overflowY="scroll")}}else{t=[],e=a("thead");const s=a("tr");Array.from(this.table.tBodies[0].rows[0].cells).forEach((()=>{const e=a("th");s.appendChild(e),t.push(e)})),e.appendChild(s),this.table.insertBefore(e,this.body);const i=[];t.forEach(((t,e)=>{const s=t.offsetWidth,a=s/this.rect.width*100;i.push(a),this.columnWidths[e]=s})),this.data.forEach((t=>{Array.from(t.cells).forEach(((t,e)=>{this.columns(t.cellIndex).visible()&&(t.style.width=`${i[e]}%`)}))})),this.table.removeChild(e)}}}fixHeight(){this.options.fixedHeight&&(this.container.style.height=null,this.rect=this.container.getBoundingClientRect(),this.container.style.height=`${this.rect.height}px`)}search(t){return!!this.hasRows&&(t=t.toLowerCase(),this.currentPage=1,this.searching=!0,this.searchData=[],t.length?(this.clear(),this.data.forEach(((e,s)=>{const a=this.searchData.includes(e);t.split(" ").reduce(((t,s)=>{let a=!1,i=null,n=null;for(let t=0;t<e.cells.length;t++)if(i=e.cells[t],n=i.hasAttribute("data-content")?i.getAttribute("data-content"):i.textContent,n.toLowerCase().includes(s)&&this.columns(i.cellIndex).visible()){a=!0;break}return t&&a}),!0)&&!a?(e.searchIndex=s,this.searchData.push(s)):e.searchIndex=null})),this.wrapper.classList.add("search-results"),this.searchData.length?this.update():(this.wrapper.classList.remove("search-results"),this.setMessage(this.options.labels.noRows)),void this.emit("datatable.search",t,this.searchData)):(this.searching=!1,this.update(),this.emit("datatable.search",t,this.searchData),this.wrapper.classList.remove("search-results"),!1))}page(t){return t!=this.currentPage&&(isNaN(t)||(this.currentPage=parseInt(t,10)),!(t>this.pages.length||t<0)&&(this.render("page"),this.render("pager"),void this.emit("datatable.page",t)))}sortColumn(t,e){this.columns().sort(t,e)}insert(t){let e=[];if(s(t)){if(t.headings&&!this.hasHeadings&&!this.hasRows){const e=a("tr");t.headings.forEach((t=>{const s=a("th",{html:t});e.appendChild(s)})),this.head.appendChild(e),this.header=e,this.headings=[].slice.call(e.cells),this.hasHeadings=!0,this.options.sortable=this.initialSortable,this.render("header"),this.activeHeadings=this.headings.slice()}t.data&&Array.isArray(t.data)&&(e=t.data)}else Array.isArray(t)&&t.forEach((t=>{const s=[];Object.entries(t).forEach((([t,e])=>{const a=this.labels.indexOf(t);a>-1&&(s[a]=e)})),e.push(s)}));e.length&&(this.rows().add(e),this.hasRows=!0),this.update(),this.setColumns(),this.fixColumns()}refresh(){this.options.searchable&&(this.input.value="",this.searching=!1),this.currentPage=1,this.onFirstPage=!0,this.update(),this.emit("datatable.refresh")}clear(t){this.body&&i(this.body);let e=this.body;if(this.body||(e=this.table),t){if("string"==typeof t){document.createDocumentFragment().innerHTML=t}e.appendChild(t)}}export(t){if(!this.hasHeadings&&!this.hasRows)return!1;const e=this.activeHeadings;let a=[];const i=[];let n,h,l,r;if(!s(t))return!1;const o={download:!0,skipColumn:[],lineDelimiter:"\n",columnDelimiter:",",tableName:"myTable",replacer:null,space:4,...t};if(o.type){if("txt"!==o.type&&"csv"!==o.type||(a[0]=this.header),o.selection)if(isNaN(o.selection)){if(Array.isArray(o.selection))for(n=0;n<o.selection.length;n++)a=a.concat(this.pages[o.selection[n]-1])}else a=a.concat(this.pages[o.selection-1]);else a=a.concat(this.activeRows);if(a.length){if("txt"===o.type||"csv"===o.type){for(l="",n=0;n<a.length;n++){for(h=0;h<a[n].cells.length;h++)if(!o.skipColumn.includes(e[h].originalCellIndex)&&this.columns(e[h].originalCellIndex).visible()){let t=a[n].cells[h].textContent;t=t.trim(),t=t.replace(/\s{2,}/g," "),t=t.replace(/\n/g,"  "),t=t.replace(/"/g,'""'),t=t.replace(/#/g,"%23"),t.includes(",")&&(t=`"${t}"`),l+=t+o.columnDelimiter}l=l.trim().substring(0,l.length-1),l+=o.lineDelimiter}l=l.trim().substring(0,l.length-1),o.download&&(l=`data:text/csv;charset=utf-8,${l}`)}else if("sql"===o.type){for(l=`INSERT INTO \`${o.tableName}\` (`,n=0;n<e.length;n++)!o.skipColumn.includes(e[n].originalCellIndex)&&this.columns(e[n].originalCellIndex).visible()&&(l+=`\`${e[n].textContent}\`,`);for(l=l.trim().substring(0,l.length-1),l+=") VALUES ",n=0;n<a.length;n++){for(l+="(",h=0;h<a[n].cells.length;h++)!o.skipColumn.includes(e[h].originalCellIndex)&&this.columns(e[h].originalCellIndex).visible()&&(l+=`"${a[n].cells[h].textContent}",`);l=l.trim().substring(0,l.length-1),l+="),"}l=l.trim().substring(0,l.length-1),l+=";",o.download&&(l=`data:application/sql;charset=utf-8,${l}`)}else if("json"===o.type){for(h=0;h<a.length;h++)for(i[h]=i[h]||{},n=0;n<e.length;n++)!o.skipColumn.includes(e[n].originalCellIndex)&&this.columns(e[n].originalCellIndex).visible()&&(i[h][e[n].textContent]=a[h].cells[n].textContent);l=JSON.stringify(i,o.replacer,o.space),o.download&&(l=`data:application/json;charset=utf-8,${l}`)}return o.download&&(o.filename=o.filename||"datatable_export",o.filename+=`.${o.type}`,l=encodeURI(l),r=document.createElement("a"),r.href=l,r.download=o.filename,document.body.appendChild(r),r.click(),document.body.removeChild(r)),l}}return!1}import(t){let e=!1;if(!s(t))return!1;const a={lineDelimiter:"\n",columnDelimiter:",",...t};if(a.data.length||s(a.data)){if("csv"===a.type){e={data:[]};const t=a.data.split(a.lineDelimiter);t.length&&(a.headings&&(e.headings=t[0].split(a.columnDelimiter),t.shift()),t.forEach(((t,s)=>{e.data[s]=[];const i=t.split(a.columnDelimiter);i.length&&i.forEach((t=>{e.data[s].push(t)}))})))}else if("json"===a.type){const t=(t=>{let e=!1;try{e=JSON.parse(t)}catch(t){return!1}return!(null===e||!Array.isArray(e)&&!s(e))&&e})(a.data);t&&(e={headings:[],data:[]},t.forEach(((t,s)=>{e.data[s]=[],Object.entries(t).forEach((([t,a])=>{e.headings.includes(t)||e.headings.push(t),e.data[s].push(a)}))})))}s(a.data)&&(e=a.data),e&&this.insert(e)}return!1}print(){const t=this.activeHeadings,e=this.activeRows,s=a("table"),i=a("thead"),n=a("tbody"),h=a("tr");t.forEach((t=>{h.appendChild(a("th",{html:t.textContent}))})),i.appendChild(h),e.forEach((t=>{const e=a("tr");Array.from(t.cells).forEach((t=>{e.appendChild(a("td",{html:t.textContent}))})),n.appendChild(e)})),s.appendChild(i),s.appendChild(n);const l=window.open();l.document.body.appendChild(s),l.print()}setMessage(t){let e=1;this.hasRows?e=this.data[0].cells.length:this.activeHeadings.length&&(e=this.activeHeadings.length),this.wrapper.classList.add("dataTable-empty"),this.label&&(this.label.innerHTML=""),this.totalPages=0,this.render("pager"),this.clear(a("tr",{html:`<td class="dataTables-empty" colspan="${e}">${t}</td>`}))}columns(t){return new r(this,t)}rows(t){return new l(this,t)}on(t,e){this.events=this.events||{},this.events[t]=this.events[t]||[],this.events[t].push(e)}off(t,e){this.events=this.events||{},t in this.events!=!1&&this.events[t].splice(this.events[t].indexOf(e),1)}emit(t){if(this.events=this.events||{},t in this.events!=!1)for(let e=0;e<this.events[t].length;e++)this.events[t][e].apply(this,Array.prototype.slice.call(arguments,1))}}t("DataTable",c)}}}));
//# sourceMappingURL=index.js.map
