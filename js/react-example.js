// Check that this file is loaded!
// alert( 'React is present and accounted for!' );

// Grab our React "root" element.
const reactRoot = document.getElementById( 'react-root' );

// Search Form component.
const SearchForm = props => {
  // "Search" field value state.
  const [search, setSearch] = React.useState( '' );
  // "Snacks" / search result array state.
  const [snacks, setSnacks] = React.useState( [] );

  // Handle search submit.
  const submitSearch = event => {
    // Prevent the form from submitting the ol'fashioned way.
    event.preventDefault();
    // console.log( 'Submitted form!' ); // Check if form submit is working.
    fetch( `http://localhost:80/api/snacks.php?search=${search}` )
      .then( response => response.json() )
      .then( results => {
        // console.log( results ); // Check if results are present.
        // Update snacks array (state) with the new results.
        setSnacks( results );
      } ) // Throw / show error if one occurs.
      .catch( error => { throw error } );
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
      <ul>
        {snacks.map( ( snack, index ) => (
          <li key={index}>
            <h4>{snack[0]}</h4>
            <dl>
              <dt>Snack Type:</dt>
              <dd>{snack[1]}</dd>
              <dt>Snack Price:</dt>
              <dd>${parseFloat( snack[2] ).toFixed( 2 )}</dd>
              <dt>Snack Calories:</dt>
              <dd>{snack[3]}</dd>
            </dl>
          </li>
        ) )}
      </ul>
    </React.Fragment>
  );
}

// Render into the real DOM.
ReactDOM.render( <SearchForm />, reactRoot );
