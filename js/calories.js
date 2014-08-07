var googleDoc = "https://spreadsheets.google.com/feeds/list/10qJ32NvXnVGsTUzKj-ZbUKlVUSKAIO377psORigEvjY/od6/public/values?alt=json";

$.getJSON(googleDoc, function(data) {
	$.each(data.feed.entry, function(index, dataRow) {

		// calories is the title so it's 

		console.log(dataRow.gsx$calories.$t);
	})
});