( function( api ) {

	// Extends our custom "jgtazalea-premium" section.
	api.sectionConstructor['jgtazalea-premium'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
