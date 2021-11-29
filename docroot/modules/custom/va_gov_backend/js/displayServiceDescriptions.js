/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal) {
  Drupal.behaviors.vaGovDisplayServiceDescriptions = {
    attach: function attach(context) {
      var loadItems = function loadItems(service) {
        if (context.getElementById(service.id + "-health_service_text_container")) {
          context.getElementById(service.id + "-health_service_text_container").remove();
        }
        if (context.getElementById(service.id + "-services-general-description")) {
          context.getElementById(service.id + "-services-general-description").remove();
        }

        var serviceSelector = context.querySelector(".field--name-field-service-name-and-descripti select");
        var wysiwyg = context.getElementById("edit-field-body-wrapper");

        var serviceSelectorSelectionClass = "empty-display-none";
        if (wysiwyg !== null) {
          wysiwyg.classList.add("empty-display-none");
        }
        if (serviceSelector !== undefined && serviceSelector.options !== undefined && serviceSelector.options[serviceSelector.selectedIndex].value !== "_none") {
          serviceSelectorSelectionClass = "not-empty-display-block";
          if (wysiwyg !== null) {
            wysiwyg.classList.remove("empty-display-none");
          }
        }

        var div = context.createElement("div");
        var button = context.createElement("button");
        button.className = "tooltip-toggle css-tooltip-toggle";
        button.value = "Why can't I edit this? VHA keeps these descriptions standardized to help Veterans identify the services they need.";
        button.type = "button";

        button.ariaLabel = "tooltip";
        button.setAttribute("data-tippy", "Why can't I edit this?\nVHA keeps these descriptions standardized to help Veterans identify the services they need.");
        button.setAttribute("data-tippy-pos", "right");
        button.setAttribute("data-tippy-animate", "fade");
        button.setAttribute("data-tippy-size", "large");
        button.id = "service-tooltip css-tooltip";
        div.id = service.id + "-health_service_text_container";
        div.className = "no-content health_service_text_container field-group-tooltip tooltip-layout centralized css-tooltip " + serviceSelectorSelectionClass;

        div.appendChild(button);

        if (drupalSettings.availableHealthServices[service.value] !== undefined && drupalSettings.availableHealthServices[service.value].type !== "") {
          var p1 = context.createElement("p");
          var s1 = context.createElement("strong");
          var typeString = drupalSettings.availableHealthServices[service.value].type;
          p1.textContent = typeString;
          s1.textContent = "Type of care: ";
          div.classList.remove("no-content");
          div.appendChild(p1);
          p1.prepend(s1);
        }
        if (drupalSettings.availableHealthServices[service.value] !== undefined && drupalSettings.availableHealthServices[service.value].name !== "") {
          var p2 = context.createElement("p");
          var s2 = context.createElement("strong");
          p2.textContent = drupalSettings.availableHealthServices[service.value].name;
          s2.textContent = "Patient friendly name: ";
          div.classList.remove("no-content");
          div.appendChild(p2);
          p2.prepend(s2);
        }
        if (drupalSettings.availableHealthServices[service.value] !== undefined && drupalSettings.availableHealthServices[service.value].conditions !== "") {
          var p3 = context.createElement("p");
          var s3 = context.createElement("strong");
          p3.textContent = drupalSettings.availableHealthServices[service.value].conditions.replace(/&nbsp;/g, " ");
          s3.textContent = "Common conditions: ";
          div.classList.remove("no-content");
          div.appendChild(p3);
          p3.prepend(s3);
        }
        if (drupalSettings.availableHealthServices[service.value] !== undefined && drupalSettings.availableHealthServices[service.value].description !== "") {
          var p4 = context.createElement("p");
          var s4 = context.createElement("strong");
          p4.textContent = drupalSettings.availableHealthServices[service.value].description.replace(/&nbsp;/g, " ");
          s4.textContent = "Service description: ";
          div.classList.remove("no-content");
          div.appendChild(p4);
          p4.prepend(s4);
        }

        service.after(div);

        if (div.textContent.length > 0) {
          var p = context.createElement("p");
          p.id = service.id + "-services-general-description";
          p.className = "services-general-description";
          p.textContent = "General service description";
          service.after(p);
        }
      };

      var descriptionFill = function descriptionFill(ss) {
        if (ss && ss.length > 0) {
          ss.forEach(function (service) {
            loadItems(service);
            service.addEventListener("change", function () {
              loadItems(service);
            });
          });
        }
      };

      $(context).ajaxComplete(function () {
        descriptionFill(context.querySelectorAll(".field--name-field-service-name-and-descripti select"));
      });

      window.addEventListener("DOMContentLoaded", function () {
        descriptionFill(context.querySelectorAll(".field--name-field-service-name-and-descripti select"));
      });
    }
  };
})(jQuery, Drupal);