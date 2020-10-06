// Check that this file is loaded!
// alert( 'React is present and accounted for!' );

// Grab our React "root" element.
const reactRoot = document.getElementById( 'react-root' );

// Search Form component.
const SearchForm = props => {
  return (
    <React.Fragment>
      <h2>Snack Search Form</h2>
      <form>
        <label htmlFor="search">
          Enter a Search Term:
          <input
            type="search"
            id="search" />
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
