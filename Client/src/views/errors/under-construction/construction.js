import React from "react";
import { Button, Col, Container, Form, Row } from "react-bootstrap";
import { Link } from "react-router-dom";

import ConstructionImg from "../../../assets/images/under-construction.png";

const Construction = () => {
  return (
    <React.Fragment>
      <div className=" maintenance">
        <Container>
          <Row className="justify-content-center">
            <Col md={8} className="text-center px-4">
              <div className="mt-5">
                <img src={ConstructionImg} alt="Under Construction" />
              </div>
            </Col>
          </Row>
        </Container>
      </div>
    </React.Fragment>
  );
};

export default Construction;
