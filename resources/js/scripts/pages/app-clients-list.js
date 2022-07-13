$(function () {
    'use strict';
    var dtClientsTable = $('.clients-list-table');
    // Customers List datatable
    if (dtClientsTable.length) {
        dtClientsTable.DataTable({
        ajax: "/clients", // JSON file to add data
        columns: [
          // columns according to JSON
          { data: "id" },
          { data: "fullName" },
          { data: "email" },
          { data: "contact_no" },
        ],
        columnDefs: [
          {
            targets: 0,
            visible:false
          },
         {
             // Actions
             targets: 4,
             title: 'Actions',
             orderable: false,
             render: function (data, type, full, meta) {
               return (
                     '<div class="btn-group">' +
                     '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                 feather.icons["more-vertical"].toSvg({ class: "font-small-4" }) +
                     "</a>" +
                     '<div class="dropdown-menu dropdown-menu-right">' +
                     '<a href="' +
                     "clients/" +
                     full["id"] +
                     '" class="dropdown-item">' +
                     feather.icons["file-text"].toSvg({
                         class: "font-small-4 mr-50",
                     }) +
                     "Details</a>" +
                     '<a href="' +
                     "clients/" +
                     full["id"] +
                    "/edit" +
                     '" class="dropdown-item">' +
                     feather.icons["archive"].toSvg({ class: "font-small-4 mr-50" }) +
                     "Edit</a>" +
                     '<a id="deletePeer" data-id="' +
                             full["id"] +
                     '" class="dropdown-item delete-record">' +
                     feather.icons["trash-2"].toSvg({ class: "font-small-4 mr-50" }) +
                     "Delete</a></div>" +
                     "</div>" +
                     "</div>"
                 );
             }
           }
        ],
        order: [[2, 'desc']],
        dom:
          '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
          '<"col-lg-12 col-xl-6" l>' +
          '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
          '>t' +
          '<"d-flex justify-content-between mx-2 row mb-1"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: 'Search',
          searchPlaceholder: 'Search..'
        },
        // Buttons with Dropdown
        buttons: [
          {
            attr: {
              'data-toggle': 'modal',
              'data-target': '#modals-slide-in'
            },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          }
        ],
        // For responsive popup
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },
      });
    }
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
      });
  });
  
  
  
  
  