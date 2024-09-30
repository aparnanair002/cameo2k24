const exportwh = document.getElementById('btn-export-wh');

const tablewh = document.getElementById('my-table-wh');

exportwh.addEventListener('click', () => {
  /* Create worksheet from HTML DOM TABLE */
  const wh = XLSX.utils.table_to_book(tablewh, {sheet: 'sheet-1'});

  /* Export to file (start a download) */
  XLSX.writeFile(wh, 'cameo_Memorygm.xlsx');
});