import React from "react";
import { Link } from "react-router-dom";
import { Navbar, Container, Nav } from "react-bootstrap";
import { BiHome } from "react-icons/bi";
import { BsCloudUpload } from "react-icons/bs";
import { MdOutlinePendingActions } from "react-icons/md";
import { CgLastpass } from "react-icons/cg";
import { MdOutlineApproval } from "react-icons/md";

function BottomNav() {
  return (
    <>
      <Navbar style={{ backgroundColor: "#3f4d67"}} fixed="bottom" variant="dark">
        <Container className="d-flex justify-content-center">
          <Nav className="me-auto">
            <div className="text-center px-1 pb-0">
              <Link style={{ color: "#ffffff" }} to="/dashboard">
                <BiHome fontSize={28} />
                <p className="p-0 m-0">Dashboard</p>
              </Link>
            </div>
            <div className="text-center px-1 pb-0">
              <Link style={{ color: "#ffffff" }} to="/upload-files">
                <BsCloudUpload fontSize={28} />
                <p className="p-0 m-0">Upload</p>
              </Link>
            </div>
            <div className="text-center px-1 pb-0">
              <Link style={{ color: "#ffffff" }} to="/entries/pending-entries">
                <MdOutlinePendingActions fontSize={28} />
                <p className="p-0 m-0">Pending</p>
              </Link>
            </div>
            <div className="text-center px-1 pb-0" to="/">
              <Link style={{ color: "#ffffff" }} to="/entries/summary">
                <CgLastpass fontSize={28} />
                <p className="p-0 m-0">Summary</p>
              </Link>
            </div>
            <div className="text-center px-1 pb-0" to="/">
              <Link style={{ color: "#ffffff" }} to="/entries/approved-entries">
                <MdOutlineApproval fontSize={28} />
                <p className="p-0 m-0">Approved</p>
              </Link>
            </div>
          </Nav>
        </Container>
      </Navbar>
    </>
  );
}

export default BottomNav;
