const exportwh = document.getElementById('btn-export');

const tablewh = document.getElementById('my-table');

exportwh.addEventListener('click', () => {
  /* Create worksheet from HTML DOM TABLE */
  const wh = XLSX.utils.table_to_book(tablewh, {sheet: 'sheet-1'});

  /* Export to file (start a download) */
  XLSX.writeFile(wh, 'cameo_wordhunt.xlsx');
});