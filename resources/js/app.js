
window.$ = window.jQuery = require('jquery');

require('bootstrap');

function tableMobilizer(tableNodes) {
    $.each(tableNodes, function (index, rawTableNode) {
        var tableNode = $(rawTableNode),
            tableRowValues = tableNode.find("tbody>tr").map(rowValues),
            newTables = createTables(tableNode.find("th"), tableRowValues),
            mobileTablesContainer = createMobileTablesContainer();

        $.each(newTables, function (index, table) {
            mobileTablesContainer.append(table);
        });

        tableNode.addClass("hidden-small-down").after(mobileTablesContainer);
    });

    function getCellValue(row) {
        return row.map(getNodeInnerHtml);
    }

    function getNodeInnerHtml(i, node) {
        if ($(node)) {
            return $(node).html();
        }
    }

    function rowValues(i, row) {
        return $(row).children().map(getNodeInnerHtml).map(getMapValue);
    }

    function getMapValue(i, element) {
        return element;
    }

    function createTables(tableHeadings, tableRowValues) {
        return tableRowValues.map(function (i, values) {
            var table = $(document.createElement("table")).addClass("mobile-table"),
                rows = buildMobileTableRows(tableHeadings, values);

            $.each(rows, function (i, row) {
                table.append(row);
            });

            return table;
        });
    }

    function buildMobileTableRows(tableHeadings, values) {
        return values.map(function (i, value) {
            var key = getCellValue(tableHeadings)[i],
                keyDiv = $(document.createElement("td")).html(key).addClass("mobile-table-key"),
                valueDiv = $(document.createElement("td")).html(value).addClass("mobile-table-value");
            if (value.trim().length !== 0) {
                if (key.trim().length === 0) {
                    return $(document.createElement("tr")).addClass("mobile-table-row").append(valueDiv);
                } else {
                    return $(document.createElement("tr")).addClass("mobile-table-row").append(keyDiv).append(valueDiv);
                }

            }
        });
    }

    function createMobileTablesContainer() {
        return $(document.createElement("div")).addClass("mobile-tables hidden-medium-up");
    }
}

$(function () {
    tableMobilizer($("table"));
});


var header = $("thead");
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if ($(window).scrollTop() >= 100 && $(this).width() > 769) {
        $("thead").addClass('sticky-top');
    } else {
        $("thead").removeClass('sticky-top');
    }
});
