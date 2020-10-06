// Check that this file is loaded!
// alert( 'React is present and accounted for!' );

// Grab our React "root" element.
const reactRoot = document.getElementById( 'react-root' );

// Search Form component.
const SearchForm = props => {
  // "Search" field value state.
  const [search, setSearch] = React.useState( '' );

  // Handle search submit.
  const submitSearch = event => {
    // Prevent the form from submitting the ol'fashioned way.
    event.preventDefault();
    console.log( 'Submitted form!' );
  }

  // Render for this component.
  return (
    <React.Fragment>
      <h2>Snack Search Form</h2>
      <form onSubmit={submitSearch}>
        <label htmlFor="search">
          Enter a Search Term:
          <input
            type="search"
            id="search"
            onChange={event => { setSearch( event.target.value ) }}
            value={search} />
        </label>
        <input
          type="submit"
          value="Search Snacks" />
      </form>
      <h3>Snack Search Results</h3>
      <ul></ul>
    </React.Fragment>
  );
}

// Render into the real DOM.
ReactDOM.render( <SearchForm />, reactRoot );
