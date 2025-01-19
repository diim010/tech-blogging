(function (api) {



	// Extends our custom "Tech Blogging" section.

	api.sectionConstructor['tech-blogging'] = api.Section.extend({



		// No events for this type of section.

		attachEvents: function () {},



		// Always make the section active.

		isContextuallyActive: function () {

			return true;

		}

	});

	jQuery("#accordion-panel-tech-blogging-theme-options").addClass("custom-class");



})(wp.customize);