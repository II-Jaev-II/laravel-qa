import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faCaretUp, faCaretDown, faStar, faCheck } from '@fortawesome/free-solid-svg-icons';

library.add(faCaretUp, faCaretDown, faStar, faCheck);

// This line will automatically find <i> tags in your HTML and replace them with SVGs
dom.watch();
